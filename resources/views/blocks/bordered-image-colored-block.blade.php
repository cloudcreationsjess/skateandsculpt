{{--
  Title: Bordered Image Color Block
  Description: A two column block with black bordered image on left and color block content on right
  Category: formatting
  Icon: menu
  Keywords: single column basic content
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section class="bordered-image-color-block">
     <div class='container'>
         <div class='colored-container background-color--{{ get_field('right_column')['block_background_color'] }}'>
             <div class='left-container'>
                 <div class='left-image'>
                     {{ the_image(get_field('left_column')['image']) }}
                 </div>
             </div>
             <div class='right-container'>
                 @if(get_field('right_column'))
                     @php($right = get_field('right_column')['basic_content'])
                     <x-basic-content :content="$right"/>
                 @endif
             </div>
         </div>
     </div>
</section>
