<?php get_template_part('templates/head'); ?>

<?php $baseFields = get_fields(); 
    // echo '<pre>';
    // var_dump($baseFields);
    // echo '</pre>';
?>

<?php if($baseFields['body_class']): ?>
    <body <?php body_class( $baseFields["body_class"] ); ?>>  
<?php else: ?>
    <body <?php body_class(); ?>>
<?php endif; ?> 



    <!--[if lt IE 8]>
        <div class="alert alert-warning">
            <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
        </div>
    <![endif]-->

    <?php
        do_action('get_header');
        // Choose the correct header
        // pick which one in config.php
        if (current_theme_supports('header-two-navs')) {
            get_template_part( 'templates/header-two-navs' );
        } elseif (current_theme_supports('header-nav-bottom')) {
            get_template_part( 'templates/header-nav-bottom' );
        } else {
            get_template_part( 'templates/header' );
        }
    ?>



    <?php if (!is_front_page() ): ?>
        <?php $image = get_field('background_image'); 
        $globalBackground = get_field('banner_test' , 'option'); ?>


        <?php if($baseFields['custom_header_text']) {
        $backgroundClass = '';
            if( !empty($image) ) { 
                $backgroundClass = ' custom-background-header';
            } ?>
            <div class="custom-header<?php echo $backgroundClass; ?>">
                <div class="container">
                    <?php echo $baseFields['custom_header_text']; ?>
                </div>
            </div>

        <?php } else if($image) { ?>
            <div class="image-header standard-background-header"> 
                <div class="container">
                    <?php if($baseFields['hide_title']) { ?>
                    <?php } else if($baseFields['custom_title']) { ?>
                        <h1><?php echo $baseFields['custom_title']; ?></h1>
                    <?php } else { ?> 
                        <h1><?php echo roots_title(); ?></h1>
                    <?php } ?>
                </div>
            </div>



        <?php } else if($globalBackground && empty($image) ) { ?>
            <div class="image-header global-background-header"> 
                <div class="container">
                    <?php if($baseFields['hide_title']) { ?>
                    <?php } else if($baseFields['custom_title']) { ?>
                        <h1><?php echo $baseFields['custom_title']; ?></h1>
                    <?php } else { ?> 
                        <h1><?php echo roots_title(); ?></h1>
                    <?php } ?>
                </div>
            </div>            


        <?php } else { ?>
            <div class="standard-header">
                <div class="container">
                    <?php if($baseFields['hide_title']) { ?>
                    <?php } else if($baseFields['custom_title']) { ?>
                        <h1><?php echo $baseFields['custom_title']; ?></h1>
                    <?php } else { ?> 
                        <h1><?php echo roots_title(); ?></h1>
                    <?php } ?>
                </div>
            </div>                
        <?php } ?>
   

        <style>
            .custom-background-header {
                background-image: url(<?php echo $image['url']; ?>);
            }
            .standard-background-header {
                background-image: url(<?php echo $image['url']; ?>);
            }
            .global-background-header {
                background-image: url(<?php echo $globalBackground['url']; ?>);
            }
        </style> 
    <?php endif; ?>


    <?php $sidebarOn = get_field('sidebar' , 'option'); ?>

    <div class="site-main wrapper" role="document">
        <?php if ( get_field('full_width') == true ) : ?>
            <div class="full-width-contain">
        <?php else: ?>
            <div class="container">
        <?php endif; ?>
            <div class="content row">
                <main class="main <?php echo roots_main_class(); ?>" role="main">
                    <?php include roots_template_path(); ?>
                </main><!-- /.main -->
                <?php if (roots_display_sidebar() && $sidebarOn ) : ?>
                    <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
                        <?php include roots_sidebar_path(); ?>
                    </aside><!-- /.sidebar -->
                <?php endif; ?>
            </div><!-- /.content -->
        </div>
    </div><!-- /.wrap -->

    <?php get_template_part('templates/footer'); ?>

</body>
</html>
