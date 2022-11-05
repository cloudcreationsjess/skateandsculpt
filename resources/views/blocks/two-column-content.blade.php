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

<section class="two-column-content background-color--{{ get_field('background_color') }}">
    <div class="two-column-content__inner">
        <div class="basic-content">
            <x-basic_content/>
        </div>
        <div class="bullet-list">
            <x-bullet_list/>
        </div>
    </div>
</section>
