<?php if(has_post_thumbnail()): ?>
    <div class="col-12 col-md-4">
        <?php the_post_thumbnail('medium', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
    </div>
<?php endif; ?>
<div class="col-12 col-md">
    <h3><?php the_title(); ?></h3>
    <p><small><?php the_date(); ?></small></p>
    <div><?= wp_trim_words( get_the_content(), 50, '...' ); ?></div>
    <br>
    <a href="<?php echo esc_url(get_permalink()); ?>">Read more about this</a>
</div>
