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
