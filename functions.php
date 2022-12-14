<?php

    /*
    |--------------------------------------------------------------------------
    | Register The Auto Loader
    |--------------------------------------------------------------------------
    |
    | Composer provides a convenient, automatically generated class loader for
    | our theme. We will simply require it into the script here so that we
    | don't have to worry about manually loading any of our classes later on.
    |
    */

    if ( ! file_exists($composer = __DIR__ . '/vendor/autoload.php') ) {
        wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
    }

    require $composer;

    /*
    |--------------------------------------------------------------------------
    | Run The Theme
    |--------------------------------------------------------------------------
    |
    | Once we have the theme booted, we can handle the incoming request using
    | the application's HTTP kernel. Then, we will send the response back
    | to this client's browser, allowing them to enjoy our application.
    |
    */

    require_once __DIR__ . '/bootstrap/app.php';

    /**
     *
     * Function to return Image src data-set
     *
     * @param $image Image array
     * @param string $size it can be thumbnail, full etc
     * @param string $alt alt-tag value
     * @param string $class custom class name
     * @param bool $is_echo true/false
     * @return string echo to page if is_echo is true other wise return string
     *
     * USAGE: {!! the_image(get_field('my-image'), 'my-class', 'full') !!}
     */
    function the_image($image, $class = '', $size = 'full') {
        echo wp_get_attachment_image($image['ID'], $size, '', ['alt' => $image['alt'], 'class' => $class]);
    }

    /**
     * Add numeric pagination
     *
     * @param int $page_count
     * @param null $query
     */
    function numeric_pagination($page_count = 9, $query = null) {
        if ( null == $query ) {
            global $wp_query;
            $query = $wp_query;
        }

        if ( 1 >= $query->max_num_pages ) {
            return;
        }

        $big = 9999999999; // need an unlikely integer

        echo '<div class="component--pagination">';
        echo paginate_links([
            'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'    => '?paged=%#%',
            'current'   => max(1, get_query_var('paged')),
            'total'     => $query->max_num_pages,
            'end_size'  => 0,
            'type'      => 'list',
            'prev_next' => false,
            'mid_size'  => $page_count,
            'next_text' => __('', 'textdomain'),
            'prev_text' => __('', 'textdomain'),
        ]);
        echo '</div>';
    }

    //ADD OPTIONS PAGE

    if( function_exists('acf_add_options_page') ) {

        acf_add_options_page(array(
            'page_title'    => 'Theme General Settings',
            'menu_title'    => 'General Info',
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'position' => 3
        ));

        acf_add_options_sub_page(array(
            'page_title'    => 'Banner Settings',
            'menu_title'    => 'Banner',
            'parent_slug'   => 'theme-general-settings',
        ));

        acf_add_options_sub_page(array(
            'page_title'    => 'Theme Footer Settings',
            'menu_title'    => 'Footer',
            'parent_slug'   => 'theme-general-settings',
        ));

    }

    //AUTOMATICALLY REGISTER BLOCKS BY MAKING FILE/////////////////////////////////

    // Check whether WordPress and ACF are available; bail if not.
    if ( ! function_exists('acf_register_block_type') ) {
        return;
    }
    if ( ! function_exists('add_filter') ) {
        return;
    }
    if ( ! function_exists('add_action') ) {
        return;
    }

    // Add the default blocks location, 'views/blocks', via filter
    add_filter('sage-acf-gutenberg-blocks-templates', function () {
        return ['views/blocks'];
    });

    /**
     * Create blocks based on templates found in Sage's "views/blocks" directory
     */
    add_action('acf/init', function () {

        // Global $sage_error so we can throw errors in the typical sage manner
        global $sage_error;

        // Get an array of directories containing blocks
        $directories = apply_filters('sage-acf-gutenberg-blocks-templates', []);

        // Check whether ACF exists before continuing
        foreach ( $directories as $directory ) {
            $dir = isSage10() ? \Roots\resource_path($directory) : \locate_template($directory);

            // Sanity check whether the directory we're iterating over exists first
            if ( ! file_exists($dir) ) {
                return;
            }

            // Iterate over the directories provided and look for templates
            $template_directory = new \DirectoryIterator($dir);

            foreach ( $template_directory as $template ) {
                if ( ! $template->isDot() && ! $template->isDir() ) {
                    // Strip the file extension to get the slug
                    $slug = removeBladeExtension($template->getFilename());
                    // If there is no slug (most likely because the filename does
                    // not end with ".blade.php", move on to the next file.
                    if ( ! $slug ) {
                        continue;
                    }

                    // Get header info from the found template file(s)
                    $file = "${dir}/${slug}.blade.php";
                    $file_path = file_exists($file) ? $file : '';
                    $file_headers = get_file_data($file_path, [
                        'title'                  => 'Title',
                        'description'            => 'Description',
                        'category'               => 'Category',
                        'icon'                   => 'Icon',
                        'keywords'               => 'Keywords',
                        'mode'                   => 'Mode',
                        'align'                  => 'Align',
                        'post_types'             => 'PostTypes',
                        'supports_align'         => 'SupportsAlign',
                        'supports_anchor'        => 'SupportsAnchor',
                        'supports_mode'          => 'SupportsMode',
                        'supports_jsx'           => 'SupportsInnerBlocks',
                        'supports_align_text'    => 'SupportsAlignText',
                        'supports_align_content' => 'SupportsAlignContent',
                        'supports_multiple'      => 'SupportsMultiple',
                        'enqueue_style'          => 'EnqueueStyle',
                        'enqueue_script'         => 'EnqueueScript',
                        'enqueue_assets'         => 'EnqueueAssets',
                    ]);

                    if ( empty($file_headers['title']) ) {
                        $sage_error(__('This block needs a title: ' . $dir . '/' . $template->getFilename(), 'sage'), __('Block title missing', 'sage'));
                    }

                    if ( empty($file_headers['category']) ) {
                        $sage_error(__('This block needs a category: ' . $dir . '/' . $template->getFilename(), 'sage'), __('Block category missing', 'sage'));
                    }

                    // Checks if dist contains this asset, then enqueues the dist version.
                    if ( ! empty($file_headers['enqueue_style']) ) {
                        checkAssetPath($file_headers['enqueue_style']);
                    }

                    if ( ! empty($file_headers['enqueue_script']) ) {
                        checkAssetPath($file_headers['enqueue_script']);
                    }

                    // Set up block data for registration
                    $data = [
                        'name'            => $slug,
                        'title'           => $file_headers['title'],
                        'description'     => $file_headers['description'],
                        'category'        => $file_headers['category'],
                        'icon'            => $file_headers['icon'],
                        'keywords'        => explode(' ', $file_headers['keywords']),
                        'mode'            => $file_headers['mode'],
                        'align'           => $file_headers['align'],
                        'render_callback' => __NAMESPACE__ . '\\sage_blocks_callback',
                        'enqueue_style'   => $file_headers['enqueue_style'],
                        'enqueue_script'  => $file_headers['enqueue_script'],
                        'enqueue_assets'  => $file_headers['enqueue_assets'],
                        'example'         => [
                            'attributes' => [
                                'mode' => 'preview',
                            ],
                        ],
                    ];

                    // If the PostTypes header is set in the template, restrict this block to those types
                    if ( ! empty($file_headers['post_types']) ) {
                        $data['post_types'] = explode(' ', $file_headers['post_types']);
                    }

                    // If the SupportsAlign header is set in the template, restrict this block to those aligns
                    if ( ! empty($file_headers['supports_align']) ) {
                        $data['supports']['align'] = in_array($file_headers['supports_align'], [
                            'true',
                            'false',
                        ], true) ? filter_var($file_headers['supports_align'], FILTER_VALIDATE_BOOLEAN) : explode(' ', $file_headers['supports_align']);
                    }

                    // If the SupportsMode header is set in the template, restrict this block mode feature
                    if ( ! empty($file_headers['supports_anchor']) ) {
                        $data['supports']['anchor'] = $file_headers['supports_anchor'] === 'true' ? true : false;
                    }

                    // If the SupportsMode header is set in the template, restrict this block mode feature
                    if ( ! empty($file_headers['supports_mode']) ) {
                        $data['supports']['mode'] = $file_headers['supports_mode'] === 'true' ? true : false;
                    }

                    // If the SupportsInnerBlocks header is set in the template, restrict this block mode feature
                    if ( ! empty($file_headers['supports_jsx']) ) {
                        $data['supports']['jsx'] = $file_headers['supports_jsx'] === 'true' ? true : false;
                    }

                    // If the SupportsAlignText header is set in the template, restrict this block mode feature
                    if ( ! empty($file_headers['supports_align_text']) ) {
                        $data['supports']['align_text'] = $file_headers['supports_align_text'] === 'true' ? true : false;
                    }

                    // If the SupportsAlignContent header is set in the template, restrict this block mode feature
                    if ( ! empty($file_headers['supports_align_text']) ) {
                        $data['supports']['align_content'] = $file_headers['supports_align_content'] === 'true' ? true : false;
                    }

                    // If the SupportsMultiple header is set in the template, restrict this block multiple feature
                    if ( ! empty($file_headers['supports_multiple']) ) {
                        $data['supports']['multiple'] = $file_headers['supports_multiple'] === 'true' ? true : false;
                    }

                    // Register the block with ACF
                    \acf_register_block_type(apply_filters("sage/blocks/$slug/register-data", $data));
                }
            }
        }
    });

    /**
     * Callback to register blocks
     */
    function sage_blocks_callback($block, $content = '', $is_preview = false, $post_id = 0) {
        // Set up the slug to be useful
        $slug = str_replace('acf/', '', $block['name']);
        $block = array_merge(['className' => ''], $block);

        // Set up the block data
        $block['post_id'] = $post_id;
        $block['is_preview'] = $is_preview;
        $block['content'] = $content;
        $block['slug'] = $slug;
        $block['anchor'] = isset($block['anchor']) ? $block['anchor'] : '';
        // Send classes as array to filter for easy manipulation.
        $block['classes'] = [
            $slug,
            $block['className'],
            $block['is_preview'] ? 'is-preview' : null,
            'align' . $block['align'],
        ];

        // Filter the block data.
        $block = apply_filters("sage/blocks/$slug/data", $block);

        // Join up the classes.
        $block['classes'] = implode(' ', array_filter($block['classes']));

        // Get the template directories.
        $directories = apply_filters('sage-acf-gutenberg-blocks-templates', []);

        foreach ( $directories as $directory ) {
            $view = ltrim($directory, 'views/') . '/' . $slug;

            if ( isSage10() ) {
                if ( \Roots\view()->exists($view) ) {
                    // Use Sage's view() function to echo the block and populate it with data
                    echo \Roots\view($view, ['block' => $block]);
                }
            } else {
                echo \App\template(locate_template("${directory}/${slug}"), ['block' => $block]);
            }
        }
    }

    /**
     * Function to strip the `.blade.php` from a blade filename
     */
    function removeBladeExtension($filename) {
        // Filename must end with ".blade.php". Parenthetical captures the slug.
        $blade_pattern = '/(.*)\.blade\.php$/';
        $matches = [];
        // If the filename matches the pattern, return the slug.
        if ( preg_match($blade_pattern, $filename, $matches) ) {
            return $matches[1];
        }

        // Return FALSE if the filename doesn't match the pattern.
        return false;
    }

    /**
     * Checks asset path for specified asset.
     *
     * @param string &$path
     *
     * @return void
     */
    function checkAssetPath(&$path) {
        if ( preg_match("/^(styles|scripts)/", $path) ) {
            $path = isSage10() ? \Roots\asset($path)->uri() : \App\asset_path($path);
        }
    }

    /**
     * Check if Sage 10 is used.
     *
     * @return bool
     */
    function isSage10() {
        return class_exists('Roots\Acorn\Application');
    }

    // Prevent WP from adding <p> tags on pages
    function disable_wp_auto_p($content) {
        if ( is_singular('page') ) {
            remove_filter('the_content', 'wpautop');
            remove_filter('the_excerpt', 'wpautop');
        }

        return $content;
    }

    //DISABLE AUTO P

    add_filter('the_content', 'disable_wp_auto_p', 0);

    add_filter('wpcf7_autop_or_not', '__return_false');

    //DISABLE ADMIN BAR
    /* Disable WordPress Admin Bar for all users */
    add_filter( 'show_admin_bar', '__return_false' );

//DISABLE GRAVITY FORMS SCROLL

    add_filter( 'gform_confirmation_anchor', '__return_false' );

    //* Dashboard Widget
    function mtt_add_dashboard_widgets() {
        wp_add_dashboard_widget(
            'mtt_dashboard_widget', // Widget slug.
            'Quick Links', // Title.
            'mtt_dashboard_widget_function' // Display function.
        );
    }
    add_action( 'wp_dashboard_setup', 'mtt_add_dashboard_widgets' );
    function mtt_dashboard_widget_function() {
        echo "
	<div style='display:table;' class='welcome-widget-wrap'>
	<a href='https://madetothrive.com' target='_blank'><img class='alignleft' style='
		float: left;
		padding-left: 25px;
		width: 75px;
		padding-top: 5px;
	' src='https://madetothrive.com/wp-content/uploads/2021/04/mtt-mark@2x.png'/></a>
	<a style='color: white; text-decoration: none;' class='welcome-widget' href='https://madetothrive.com' target='_blank'>
		<button style='
			border: none;
		    color: white;
		    text-transform: uppercase;
		    letter-spacing: .13em;
		    padding: 15px 20px;
		    font-weight: bold;
		    font-size: 12px;
		    display: block;
		    margin: 5px auto;
		    background: #c2b7ab;
		    width: 100%;
		    cursor: pointer;
		    width: calc(100% - 150px);
			float: right;
			margin-right: 10px;
		'>Watch Your Training Video</button>
	</a>
	<a style='color: white; text-decoration: none;' class='welcome-widget' href='https://madetothrive.com/support' target='_blank'>
		<button style='
			border: none;
		    color: white;
		    text-transform: uppercase;
		    letter-spacing: .13em;
		    padding: 15px 20px;
		    font-weight: bold;
		    font-size: 12px;
		    display: block;
		    margin: 5px auto;
		    background: #c2b7ab;
		    cursor: pointer;
		    width: calc(100% - 150px);
			float: right;
			margin-right: 10px;
		'>Schedule Support/Revisions</button>
	</a>
	</div>
	";
    }

    //clean dashboard

    function remove_dashboard_meta() {
        remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); //Removes the 'incoming links' widget
        remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); //Removes the 'plugins' widget
        remove_meta_box('dashboard_primary', 'dashboard', 'normal'); //Removes the 'WordPress News' widget
        remove_meta_box('dashboard_secondary', 'dashboard', 'normal'); //Removes the secondary widget
        remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); //Removes the 'Recent Drafts' widget
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); //Removes the 'Activity' widget
        remove_meta_box('dashboard_activity', 'dashboard', 'normal'); //Removes the 'Activity' widget (since 3.8)
        remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
    }
    add_action('admin_init', 'remove_dashboard_meta');
