<?php
    $id = get_the_id();
    $videoURL = get_post_meta( $id , 'a_link', true);
    $embed_code = wp_oembed_get($videoURL);
 ?>

<div class="row">
    <?php if(has_post_thumbnail()): ?>
        <div class="col-12 col-md-4">
            <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
        </div>
    <?php endif; ?>
    <div class="col-12 col-md">
        <div class="contentRow">
            <?php the_content(); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="videoWrapper">
            <?php echo $embed_code?>
         </div>
    </div>
</div>
