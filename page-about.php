<?php
/*
	Template Name: About Template
*/
get_header(); ?>

<div class="container main-container">
    <div class="row">
        <div class="col-12">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
            <hr>
        </div>
    </div>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>
            <div class="row">
                <div class="col-12"><?php the_content(); ?></div>
            </div>
            <hr>
        <?php endwhile; ?>
    <?php endif; ?>
    <div class="row">
        <?php
        $args = array(
            'post_status' => 'publish',
            'post_type' => 'page',
            'pagename' => 'about-us/directors-report'
        );
        $directorsPage = new WP_Query( $args );
        ?>
        <?php if($directorsPage->have_posts()): ?>
            <?php while($directorsPage->have_posts()): $directorsPage->the_post();?>
                <div class="col-12 col-md-4">
                    <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
                </div>
                <div class="col-12 col-md-8">
                    <h2>Director's Report</h2>
                    <div class="">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php echo esc_url(get_permalink()); ?>">Read More</a>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="row mt-4">
        <div class="col-12 col-sm-4 text-center">
            <?php
            $args = array(
                'post_status' => 'publish',
                'post_type' => 'page',
                'pagename' => 'about-us/staff'
            );
            $staffPage = new WP_Query( $args );
            ?>
            <?php if($staffPage->have_posts()): ?>
                <?php while($staffPage->have_posts()): $staffPage->the_post();?>
                    <a href="<?php echo esc_url(get_permalink()); ?>">
                        <h3><?php the_title() ?></h3>
                        <?php the_post_thumbnail('about-thumb', array('class' => 'img-fluid')); ?>
                    </a>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="col-12 col-sm-4 text-center">
            <?php
            $args = array(
                'post_status' => 'publish',
                'post_type' => 'page',
                'pagename' => 'about-us/alumni'
            );
            $alumiPage = new WP_Query( $args );
            ?>
            <?php if($alumiPage->have_posts()): ?>
                <?php while($alumiPage->have_posts()): $alumiPage->the_post();?>
                    <a href="<?php echo esc_url(get_permalink()); ?>">
                        <h3><?php the_title() ?></h3>
                        <?php the_post_thumbnail('about-thumb', array('class' => 'img-fluid')); ?>
                    </a>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="col-12 col-sm-4 text-center">
            <?php
            $args = array(
                'post_status' => 'publish',
                'post_type' => 'page',
                'pagename' => 'about-us/employment'
            );
            $EmploymentPage = new WP_Query( $args );
            ?>
            <?php if($EmploymentPage->have_posts()): ?>
                <?php while($EmploymentPage->have_posts()): $EmploymentPage->the_post();?>
                    <a href="<?php echo esc_url(get_permalink()); ?>">
                        <h3><?php the_title() ?></h3>
                        <?php the_post_thumbnail('about-thumb', array('class' => 'img-fluid')); ?>
                    </a>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
