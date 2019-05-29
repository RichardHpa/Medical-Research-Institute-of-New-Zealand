<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php wp_head(); ?>

        <script>
            function backgroundLoaded(element) {
                var url = "url('" + element.src + "')";
                var parent = element.parentNode;
                var bgPosition = element.dataset.position;
                if (bgPosition) {
                    parent.style.backgroundPosition = bgPosition;
                }
                parent.style.backgroundImage = url;
                parent.style.opacity = "1";
            }
        </script>
    </head>
    <body <?php body_class();?>>

        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-whiteTrans">
            <?php if ( is_admin_bar_showing() ) echo '<div style="padding-top: 32px;"></div>';?>
            <div class="container">

                <?php
                    $blog_info = get_bloginfo( 'title' );
                    $url = home_url();
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_id , '' );
                ?>
                <?php if ( has_custom_logo() ): ?>
                    <a class="navbar-brand" href="<?= esc_url( $url ); ?>"><img src="<?= esc_url($logo[0]) ?>" height="90" class="d-inline-block align-top"></a>
                <?php else: ?>
                    <a class="navbar-brand" href="<?= esc_url( $url ); ?>"><?= $blog_info  ?></a>
                <?php endif; ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'Primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'bs-example-navbar-collapse-1',
                        'menu_class'        => 'nav navbar-nav ml-auto',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    ) );
                ?>
            </div>
        </nav>
