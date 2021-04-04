<?php 
/**
* Template name: Ancho completo
*
* Plantilla de ancho completo
*
* Plantilla similar a page.php pero cambiando la clase del contenido .col-md-9 por .col y sin sidebar
* 
* @package Slan
* @subpackage Slan Hotel
* @since 1.0
*/
 ?>

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
            <div class="row">
                <div class="col">
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
            </div>
        </div>
    </section>
</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>