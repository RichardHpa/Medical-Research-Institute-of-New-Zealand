<div class="post mb-2">
    <h4><?php the_title(); ?></h4>
    <p><?= wp_trim_words( get_the_excerpt(), 100, '...' ); ?></p>
    <a href="<?php echo esc_url(get_permalink()); ?>">Read more about this</a>
</div>
