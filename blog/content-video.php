<?php
    $id = get_the_id();
    $videoURL = get_post_meta( $id , 'a_link', true);
    $embed_code = wp_oembed_get($videoURL);
 ?>

<div class="col-12 col-md-4">
    <div class="videoWrapper">
        <?php echo $embed_code?>
     </div>
</div>
<div class="col-12 col-md-8">
    <h3><?php the_title(); ?></h3>
    <p><small><?php the_date(); ?></small></p>
    <div><?= wp_trim_words( get_the_excerpt(), 50, '...' ); ?></div>
    <br>
    <a href="<?php echo esc_url(get_permalink()); ?>">Watch the video here</a>
</div>
