<?php
/*
	Template Name: Publications Template
*/
get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
            <hr>
        </div>
    </div>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>
            <div class="row">
                <div class="col-12">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <div class="row">
        <div class="col-12 col-md-8">
        <?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
                'post_status' => 'publish',
                'post_type' => 'publications',
                'paged' => $paged,
                'posts_per_page' => 20,
            );
            $custom_query = new WP_Query( $args );
        ?>
        <?php while($custom_query->have_posts()) :
              $custom_query->the_post();
        ?>
            <?php
                $id = get_the_id();
                $year = get_the_date();
                $old_date_timestamp = strtotime($year);
                $pub_year = date('Y', $old_date_timestamp);
            ?>
            <?php if($currentyear != $pub_year): ?>
                <?php $currentyear = $pub_year; ?>
                <h2><?php echo $currentyear; ?></h2>
            <?php endif; ?>
            <div>
                <h4><?php the_title(); ?></h4>
                <p><small><?php echo get_post_meta( $id , 'publication_authors', true); ?></small></p>
                <p><?php echo $new_date ?></p>
                <a href="<?php echo esc_url(get_post_meta( $id , 'publication_link', true)); ?>" target="blank">View</a>
                <hr>
            </div>
        <?php endwhile; ?>
              <?php if (function_exists("pagination")) {
                  pagination($custom_query->max_num_pages);
              } ?>
        </div>
        <div class="col-12 col-md-4 well">
            <h3>Archive</h3>
            <?php $args = array(
                'post_type'    => 'publications',
                'type'         => 'monthly',
                'echo'         => 0
            );
            echo '<ul>'.wp_get_archives($args).'</ul>';
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
