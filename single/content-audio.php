<?php $id = get_the_id(); ?>
<div class="row">
    <div class="col-12">
        <div class="contentRow">
            <?= the_content(); ?>
        </div>
    </div>
</div>
<?php if(get_post_meta( $id , 'a_link', true)): ?>
<div class="row">
    <div class="col-12">
        <div>
            <iframe src="<?= get_post_meta( $id , 'a_link', true); ?>" width="100%" height="80px" frameborder="0"></iframe>
        </div>
    </div>
</div>
<?php endif; ?>
