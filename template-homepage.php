<?php 
/**
* Template name: Pagina de inicio
*
* Plantilla de pagina de inicio
*
* Plantilla para mostrar la pagina de inicio
* 
* @package Slan
* @subpackage Slan Hotel
* @since 1.0
*/
 ?>

<?php get_header(); ?>

<?php 

        $options = get_theme_mod('slan_settings');

        // Titulo seccion habitaciones
        if ( ! empty($options['rooms_section_title']) ) {
            $rooms_section_title = $options['rooms_section_title'];
        }

        if ( isset( $options['show_rooms_section'] ) ) {
            $show_rooms_section = $options['show_rooms_section'];
        } else{
            $show_rooms_section = false;
        }


        // Titulo seccion ultimos articulos
        if ( ! empty($options['last_posts_section_title']) ) {
            $last_posts_section_title = $options['last_posts_section_title'];
        }

        if ( isset( $options['show_last_posts_section'] ) ) {
            $show_last_posts_section = $options['show_last_posts_section'];
        } else{
            $show_last_posts_section = false;
        }



 ?>

<section class="main main--home">
    <?php if ( has_post_thumbnail() ): ?>
        <?php  $banner_image =  wp_get_attachment_image_src( get_post_thumbnail_id() , 'full'); ?>
        <section class="main-banner parallax-window" data-parallax="scroll" data-image-src="<?php echo $banner_image[0]; ?>">
    <?php else: ?>
        <section class="main-banner parallax-window" data-parallax="scroll" data-image-src="<?php echo IMAGES; ?>/homebanner.jpg">
    <?php endif; ?>

        <div class="main-banner-inner">
            <div class="container">
                <div class="main-banner-content text-center">
                    <h2><?php the_field('titulo_de_banner'); ?></h2>
                    <p><?php the_field('subtitulo_de_banner'); ?></p>
                    <?php if ( get_field('deseas_boton_de_llamada_a_la_accion') == 'Si' ): ?>
                        <a href="<?php the_field('enlace_del_boton'); ?>" class="btn btn-primary btn-lg"><?php the_field('texto_del_boton'); ?></a>
                    <?php endif ?>
                </div>
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
                                <?php if ( have_posts() ): while( have_posts() ): the_post(); ?>

                                    <article class="post">
                                        <div class="post-content">
                                            <?php the_content(); ?>
                                        </div>
                                    </article>
                                    
                                <?php endwhile; endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if ( $show_rooms_section == true ): ?>

            <?php $home_rooms = new WP_Query(array(

                'post_type' => 'habitaciones',
                'posts_per_page' => 3

            )); ?>
            
            <?php if ( $home_rooms->have_posts() && $home_rooms->post_count > 2 ): ?>


                
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <?php if ( isset($rooms_section_title) ): ?>
                                <h2 class="section-title text-center my-5 pb-3 text-uppercase"><?php echo $rooms_section_title; ?></h2>
                            <?php else: ?>
                                <h2 class="section-title text-center my-5 pb-3 text-uppercase">HABITACIONES DESTACADAS</h2>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <section class="featured-rooms">
                    <div class="container">

                        <?php while( $home_rooms->have_posts() ): $home_rooms->the_post() ?>
                            
                            <div class="row room-row no-gutters">
                                <div class="col-md-8">
                                    <?php if ( has_post_thumbnail() ): ?>
                                        <div class="room-thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('room_home_size_image'); ?>
                                            </a>
                                        </div>
                                    <?php endif ?>
                                </div>
                                <div class="col-md-4">
                                    <div class="room-info bg-white">
                                        <a href="<?php the_permalink(); ?>">
                                            <h3 class="room-info__title"><?php the_title(); ?></h3>
                                        </a>
                                        <p class="room-info--date"><?php the_time( get_option('date_format') ); ?></p>
                                        <div class="room-info--excerpt">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        <p class="room-info--type">
                                            <?php echo get_the_term_list( $post->ID, 'adecuacion', 'Adecuado para: ', ', ' ) ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; ?>
                        
                    </div>
                </section>


                
            <?php endif; ?>

        <?php endif ?>

        <?php if ( $show_last_posts_section == true ): ?>
            <section class="last-posts">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <?php if ( isset($last_posts_section_title) ): ?>
                                            <h2 class="section-title text-center my-5 py-3 text-uppercase"><?php echo $last_posts_section_title; ?></h2>
                                        <?php else: ?>
                                            <h2 class="section-title text-center my-5 py-3 text-uppercase">ÚLTIMOS ARTÍCULOS</h2>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <?php $last_posts = new WP_Query(array(

                                        'post_type' => 'post',
                                        'posts_per_page' => 3

                                    )); ?>
                                    <?php if ( $last_posts->have_posts() ): while( $last_posts->have_posts() ): $last_posts->the_post(); ?>
                                        <div class="col-md-4">
                                            <article class="post">
                                                <?php if ( has_post_thumbnail() ): ?>
                                                    <div class="post-thumbnail">
                                                        <?php the_post_thumbnail('blog_size_image'); ?>
                                                    </div>
                                                <?php endif ?>
                                                <div class="post-content">
                                                    <h2 class="post-title"><?php the_title(); ?></h2>
                                                    <div class="post-excerpt">
                                                        <?php the_excerpt(); ?>
                                                    </div>
                                                    <a href="<?php the_permalink(); ?>" class="view-more-button btn btn-primary"><?php _e('VER MÁS', 'slan'); ?></a>
                                                </div>
                                            </article>
                                        </div>
                                    <?php endwhile; endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif ?>
    </section>
</section>

<?php get_footer(); ?>