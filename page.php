<?php get_header(); ?>

<?php if ( have_posts() ): while( have_posts() ): the_post(); ?>
<section class="main">
    <?php if ( has_post_thumbnail() ): ?>
        <?php  $banner_image =  wp_get_attachment_image_src( get_post_thumbnail_id() , 'full'); ?>
        <section class="main-banner" style="background-image: url(<?php echo $banner_image[0]; ?>);">
    <?php else: ?>
    <section class="main-banner" style="background-image: url('<?php echo IMAGES; ?>/homebanner.jpg');">
    <?php endif; ?>
        <div class="main-banner-inner">
            <div class="container">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </section>

    <section class="page-content page-content--page">
        <div class="container">
            <?php if (is_active_sidebar('main-sidebar')): ?>
            <div class="row">
            <?php else: ?>
            <div class="row justify-content-center">
            <?php endif; ?>
                <div class="col-md-9">
                    <div class="main-content">
                        <div class="row">
                            <div class="col post-col">
                                <article class="post">
                                    <div class="post-content">
                                        <?php the_content(); ?>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (is_active_sidebar('main-sidebar')): ?>
                <div class="col-md-3">
                    <?php get_sidebar(); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>