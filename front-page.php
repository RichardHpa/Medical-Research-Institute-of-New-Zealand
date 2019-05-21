<?php get_header(); ?>


<?php if(get_theme_mod('customTheme_Image_Slide1')): ?>
    <?php $imageURL = wp_get_attachment_url(get_theme_mod('customTheme_Image_Slide1'));  ?>
    <div id="background-carousel">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image:url(<?=$imageURL ?>);"></div>
                <?php if(get_theme_mod('customTheme_Image_Slide2')): ?>
                    <?php $imageURL2 = wp_get_attachment_url(get_theme_mod('customTheme_Image_Slide2'));  ?>
                        <div class="carousel-item" style="background-image:url(<?=$imageURL2 ?>);"></div>
                <?php endif; ?>
                <?php if(get_theme_mod('customTheme_Image_Slide3')): ?>
                    <?php $imageURL3 = wp_get_attachment_url(get_theme_mod('customTheme_Image_Slide3'));  ?>
                        <div class="carousel-item" style="background-image:url(<?=$imageURL3 ?>);"></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="main-text">
            <div class="col-md-12">
                <h1><?php bloginfo('name'); ?></h1>
                <h3><?php bloginfo('description'); ?></h3>
            </div>
        </div>
    </div>
<?php endif; ?>


<div class="container-fluid px-0">
    <div class="section-1">
        <?php if(have_posts()): ?>
            <?php while(have_posts()): the_post();?>
                <div class="row front-block d-flex">
                    <div class="d-none d-sm-flex col-12 col-sm-5 image-block hidden-xs" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
                    <div class="col-12 col-sm-6 p-5 align-self-center">
                        <div><?php the_content(); ?></div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <?php
        $lastPost = new WP_query("type=post&posts_per_page=3");
    ?>
    <?php if($lastPost->have_posts()): ?>
        <div class="section-2">
            <div class="row">
                <div class="col-12 col-md-6 p-5 offset-md-1">
                    <h3>Latest News</h3>
                    <?php while($lastPost->have_posts()): $lastPost->the_post();?>
                        <?php get_template_part('front/content',get_post_format()); ?>
                    <?php endwhile; ?>
                </div>
                <div class="d-none d-md-flex col-12 col-md-5 image-block" style="background-image:url(<?= get_template_directory_uri(); ?>/assets/images/journals.jpg)">

                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php
        $arg = array(
            'post_type' => 'recruiting',
            'meta_key' => 'front-page',
            'value' => 'yes'
        );
        $recuitingPosts = new WP_Query($arg);
    ?>
    <?php if($recuitingPosts->have_posts()): ?>
        <div class="container my-5">
            <div class="row">
                <div class="col-12">
                    <p>
                        The Institute regularly needs volunteers for studies, we currently have the following requirements.
                        If you don't meet the criteria below but are still interested in volunteering for research studies,
                        please contact Mathew mathew.williams@mrinz.ac.nz (or 04-805-0243) so that we can get in touch when
                        future opportunities arise.
                    </p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <ul class="recruiting">
                        <?php while($recuitingPosts->have_posts()): $recuitingPosts->the_post();?>
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <li class="front-list"><strong><?php the_title(); ?></strong></li>
                            </a>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>



<?php get_footer(); ?>
