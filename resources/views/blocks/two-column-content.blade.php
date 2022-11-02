{{--
  Title: Two Column Bullet List
  Description: Block with two columns one of content and one a bullet list
  Category: formatting
  Icon: menu
  Keywords: two column content
  Mode: edit
  Align: center
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
--}}

<section id="two-column-content" class="background-color--{{ get_field('background_color') }}">
    <div class="row">
        <div class="col-lg-6 align-self-center">
            <div class="basic-content">
                <x-basic_content />
            </div>
        </div>
        <div class="col-lg-6 align-self-center">
            <div class="bullet-list">
                <x-bullet_list />
            </div>
        </div>
    </div>
</section>
