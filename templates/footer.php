<footer class="site-footer content-info" role="contentinfo">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <?php dynamic_sidebar( 'footer-a' ); ?>
                </div>
                <div class="col-sm-6 col-md-3">
                    <?php dynamic_sidebar( 'footer-b' ); ?>
                </div>
                <div class="col-sm-6 col-md-3">
                    <?php dynamic_sidebar( 'footer-c' ); ?>
                </div>
                <div class="col-sm-6 col-md-3">
                    <?php dynamic_sidebar( 'footer-d' ); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p><?php bloginfo( 'name' ); ?> &copy; <?php echo date( 'Y' ); ?>. All Rights reserved. <a href="#">Privacy Policy</a>. Powered by <a href="https://www.lemonadestand.org/" target="_blank">Lemonade Stand</a></p>
        </div>
    </div>
</footer>

<?php the_field('footer_injection', 'option'); ?>

<?php wp_footer(); ?>
