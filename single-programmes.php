<?php get_header(); ?>
<?php $id = get_the_id(); ?>
<div class="container main-container">
    <div class="row">
        <div class="col-12">
            <h2 class="page-title"><?php single_post_title(); ?></h2>
            <?php if(get_post_meta( $id, 'director', true ) != ""): ?>
                <p><strong>Director: </strong><?php echo get_post_meta( $id, 'director', true ) ?></p>
            <?php endif; ?>
        </div>
    </div>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>
            <?php get_template_part('single/content',get_post_format()); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
