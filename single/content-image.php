<?php if(has_post_thumbnail()): ?>
<div class="row">
    <div class="col-12">
        <?php the_post_thumbnail('full', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
    </div>
</div>
<?php endif; ?>
<div class="row">
    <div class="col-12">
        <div class="contentRow">
            <?= the_content(); ?>
        </div>
    </div>
</div>
