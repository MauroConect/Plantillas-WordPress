<?php get_header(); ?>

<?php if ( have_posts() ): while( have_posts() ): the_post(); ?>
<section class="main main--single-room">
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
                        <hr>
                        <div class="row py-5">
                            <div class="col-md-4 text-center">
                                <div class="room-blurb">
                                    <div class="room-blurb__image">
                                        <i></i>
                                    </div>
                                    <h4><?php the_field('titulo_caracteristica_1'); ?></h4>
                                    <p><?php the_field('texto_caracteristica_1'); ?></p>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="room-blurb">
                                    <div class="room-blurb__image">
                                        <i></i>
                                    </div>
                                    <h4><?php the_field('titulo_caracteristica_2'); ?></h4>
                                    <p><?php the_field('texto_caracteristica_2'); ?></p>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="room-blurb">
                                    <div class="room-blurb__image">
                                        <i></i>
                                    </div>
                                    <h4><?php the_field('titulo_caracteristica_3'); ?></h4>
                                    <p><?php the_field('texto_caracteristica_3'); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php if (get_field('desea_añadir_imagenes') == 'Si'): ?>
                            <hr>
                            <div class="row py-3">
                                <div class="col">
                                    <div class="room-gallery">
                                        <img src="<?php the_field('imagen_1'); ?>" alt="">
                                        <img src="<?php the_field('imagen_2'); ?>" alt="">
                                        <img src="<?php the_field('imagen_3'); ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                        <hr>
                        <div class="row py-5">
                            <div class="col">
                                <div class="call-to-action-button-container text-center">
                                    <a href="<?php esc_url(the_field('enlace_de_boton_de_llamada_a_la_accion')); ?>" class="btn btn-primary btn-block btn-lg"><?php the_field('texto_boton_de_llamada_a_la_accion'); ?></a>
                                </div>
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