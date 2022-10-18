<footer class="content-info">
    {{--  @php(dynamic_sidebar('sidebar-footer'))--}}
    <div class='footer__top-bar'>
        <div class='footer__top-bar__subscribe'>

        </div>
        <div class='footer__top-bar__logo'></div>
        <div class='footer__top-bar__links'>

        </div>
    </div>
    <div class='footer__bottom-bar'>
            © Copyright  <?php echo date('Y'); ?> {!! the_field('business_name', 'options') !!} &bull; <a href="/privacy-policy/">Privacy</a> &bull; <a href="/terms">Terms</a> &bull;
            <a href='/faq'>faq</a> &bull; <a href='https://saevilrow.co/'>Site design by Saevil Row</a>
    </div>

</footer>
</div><!-- #app end -->

@php(do_action('get_footer'))
@php(wp_footer())
@stack('footer.scripts')
</body>
</html>
