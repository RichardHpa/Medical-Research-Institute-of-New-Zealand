<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
        </div>
    </div>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>
            <div class="row">
                <div class="col-12">
                    <?php if(has_post_thumbnail()): ?>
                        <div class="singlur-img"><?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?></div>
                    <?php endif; ?>
                    <div><?php the_content(); ?></div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
