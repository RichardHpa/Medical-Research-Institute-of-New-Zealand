<?php get_header(); ?>
<?php $id = get_the_id(); ?>
<div class="container main-container">
    <div class="row">
        <div class="col-12">
            <h2 class="page-title"><?php single_post_title(); ?></h2>
            <p><small><?php echo get_the_date(); ?></small></p>
            <hr>
        </div>
    </div>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>
            <div class="row">
                <div class="col-12">
                    <?php the_post_thumbnail('large', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']); ?>
                    <h4><?= get_post_meta( $id, 'study_title', true ); ?></h4>
                    <ul class="rego_list">
                        <li><strong>Registration:</strong> <?= get_post_meta( $id, 'resgistration', true ); ?></li>
                        <li><strong>Ethics:</strong> <?= get_post_meta( $id, 'ethics', true ); ?></li>
                        <li><strong>Medsafe:</strong> <?= get_post_meta( $id, 'medsafe', true ); ?></li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="row">
                <?php if(get_post_meta( $id, 'take_part', true )): ?>
                <div class="col-12 col-sm-6">
                    <?php
                        $list = get_post_meta( $id, 'take_part', true );
                        $list = str_replace('[', '', $list);
                        $list = str_replace(']', '', $list);
                        $list = str_replace('"', '', $list);
                        $list = $array = explode(',', $list);
                     ?>
                     <p><strong>To take part in this study you must:</strong></p>
                     <ul class="take_part_list">
                         <?php foreach($list as $listItem): ?>
                             <li><?= $listItem  ?></li>
                         <?php endforeach; ?>
                     </ul>
                </div>
                <?php endif; ?>
                <?php if(get_post_meta( $id, 'not_able', true )): ?>
                <div class="col-12 col-sm-6">
                    <?php
                        $list = get_post_meta( $id, 'not_able', true );
                        $list = str_replace('[', '', $list);
                        $list = str_replace(']', '', $list);
                        $list = str_replace('"', '', $list);
                        $list = $array = explode(',', $list);
                     ?>
                     <p><strong>You will will not be able to take part in the study if:</strong></p>
                     <ul class="cant_take_part_list">
                         <?php foreach($list as $listItem): ?>
                             <li><?= $listItem  ?></li>
                         <?php endforeach; ?>
                     </ul>
                </div>
                <?php endif; ?>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
