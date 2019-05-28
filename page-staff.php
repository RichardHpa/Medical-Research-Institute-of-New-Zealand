<?php
/*
	Template Name: Staff Template
*/
get_header();
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
?>
<div class="container main-container">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
        </div>
    </div>
</div>

<div class="container-fluid background-image" style="background-image:url(<?= $featured_img_url ?>)"></div>

<div class="container">

    <?php
        $arg = array(
		          'hide_empty'    => true
              );
              $member_group_terms = get_terms( 'group', $arg );
    ?>
    <?php
        foreach ( $member_group_terms as $member_group_term ) {

        $member_group_query = new WP_Query( array(
            'post_type' => 'staff',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'group',
                    'field' => 'slug',
                    'terms' => array( $member_group_term->slug ),
                    'operator' => 'IN'
                )
            )
        ) );
    ?>
    <h2><?php echo $member_group_term->name; ?></h2>
    <ul class="staff_list">
    <?php
    if ( $member_group_query->have_posts() ) : while ( $member_group_query->have_posts() ) : $member_group_query->the_post(); ?>
    <?php
        $id = get_the_id();
        $role = get_post_meta( $id, 'role', true );
        if($member_group_term->name != 'Director' && $member_group_term->name != 'Deputy Directors'){
            $roletag = ' - '.$role;
        }
    ?>
        <li>
            <?php if(has_post_thumbnail() || !empty( get_the_content() )): ?>
                <a href="<?php echo esc_url(get_permalink()); ?>">
            <?php endif; ?>
            <?php echo the_title(); ?><strong><?= $roletag?></strong>
            <?php if(has_post_thumbnail() || !empty( get_the_content() )): ?>
                </a>
            <?php endif; ?>
        </li>
    <?php endwhile; endif; ?>
    </ul>
    <?php
    $member_group_query = null;
    }
    ?>

</div>
<?php get_footer(); ?>
