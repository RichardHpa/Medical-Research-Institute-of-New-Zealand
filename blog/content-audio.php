<div class="col-12">
    <h3><?php the_title(); ?></h3>
    <p><small><?php the_date(); ?></small></p>
    <div><?= wp_trim_words( get_the_content(), 50, '...' ); ?></div>
    <br>
    <a href="<?php echo esc_url(get_permalink()); ?>">Hear more about it</a>
</div>
