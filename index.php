<?php get_header(); ?>

<?php if(have_posts()): ?>
    <?php while(have_posts()): the_post();?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1><?php the_title(); ?></h1>
                    <p><small><?php the_date(); ?></small></p>
                </div>
            </div>
            <div class="row">
                <?php if(has_post_thumbnail()): ?>
                    <div class="col-12 col-md-3">
                        <?php the_post_thumbnail('medium', array('class' => 'img-fuild')); ?>
                    </div>
                <?php endif; ?>
                <div class="col">
                    <div class="row">
                        <div class="col-12">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php if(!is_singular()): ?>
                        <div class="row">
                            <div class="col-12">
                                <a href="<?php echo esc_url(get_permalink()); ?>">Read more about this</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
