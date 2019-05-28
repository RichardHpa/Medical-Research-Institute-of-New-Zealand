<?php
/*
	Template Name: Employment Template
*/
get_header(); ?>
<div class="container main-container">
    <div class="row">
        <div class="col-12">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
            <hr>
        </div>
        <div class="col-12">
            <?php if(have_posts()): ?>
                <?php while(have_posts()): the_post();?>
                    <p><?php the_content(); ?></p>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $arg = array(
        'post_type' => 'employment',
        'paged' => $paged,
        'posts_per_page' => 10,
    );
    $alumni = new WP_Query($arg);
    ?>
    <?php if($alumni->have_posts()): ?>
        <?php while($alumni->have_posts()): $alumni->the_post();?>
            <div class="row">
                <div class="col-12 col-sm-9 alumni-text">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                    <a href="<?php echo esc_url(get_permalink()); ?>">Read about the job</a>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="row">
            <div class="col-12">
                <h3>New studies often require new people, current positions will be listed here.</h3>
                <p>The MRINZ employs staff from many professional backgrounds, IT, Programmers, Nurses, Administrators, Research scientists and Doctors. We also host New Zealand based and international students for summer internships through to PhD study with Victoria University of Wellington.   Future opportunities will be posted here.</p>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
