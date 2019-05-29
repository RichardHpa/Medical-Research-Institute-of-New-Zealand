<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-9">
                <?php if(have_posts()): ?>
                    <?php while(have_posts()): the_post();?>
                        <div class="row contentRow">
                            <?php get_template_part('blog/content',get_post_format()); ?>
                        </div>
                        <hr>
                    <?php endwhile; ?>
                    <div class="row">
                        <div class="col-12">
                            <span class="nav-next pull-left"><?php previous_posts_link( 'Newer posts' ); ?></span>
                            <span class="nav-previous pull-right"><?php next_posts_link( 'Older posts' ); ?></span>
                        </div>
                    </div>

                <?php endif; ?>
            </div>
            <div class="col-12 col-md-3 card bg-light p-3 h-100">
                <h3>Archive</h3>
                <?php $args = array(
                    'post_type'    => 'post',
                    'type'         => 'monthly',
                    'echo'         => 0
                );
                echo '<ul>'.wp_get_archives($args).'</ul>';
                ?>
            </div>
        </div>

    </div>
<?php get_footer(); ?>
