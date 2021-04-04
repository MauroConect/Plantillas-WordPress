<?php get_header(); ?>

<section class="main">
    <section class="page-content page-content--single">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="main-content">
                        <?php if ( have_posts() ): while( have_posts() ): the_post(); ?>

                            <div class="row">
                                <div class="col post-col">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                                        <div class="post-title-container">
                                            <span class="post-category"><?php the_category(', '); ?></span>
                                            <h1 class="post-title"><?php the_title(); ?></h1>
                                            <p class="post-date"><?php the_time( get_option('date_format') ); ?></p>
                                        </div>
                                        <?php if ( has_post_thumbnail() ): ?>
                                            <div class="post-thumbnail">
                                                <?php the_post_thumbnail('blog_size_image'); ?>
                                            </div>
                                        <?php endif ?>
                                        <div class="post-content">
                                            <div class="post-excerpt">
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>

                            <div class="row author-info-row">
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-md">
                                    <div class="author-info">
                                        <?php if ( get_avatar( get_the_author_meta('ID') ) ): ?>

                                            <img src="<?php echo IMAGES; ?>/avatar-default.png" alt="">
                                            
                                        <?php else: ?>
                                            <?php get_avatar( get_the_author_meta('ID') ); ?>
                                        <?php endif; ?>
                                        
                                        <div class="author-name">
                                            <p>Escrito por <a href="#"><?php the_author_posts_link(); ?></a></p>
                                            <span><?php the_author_meta('nickname'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="post-meta text-right">
                                        <div class="post-categories">
                                            <?php // the_category(' ,'); ?>
                                        </div>
                                        <div class="post-tags">
                                            <?php // the_tags(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                            
                        <?php endwhile; endif; ?>

                        <div class="row">
                            <div class="col">
                                <div class="comments-container">

                                    <?php comments_template('', true); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<?php get_footer(); ?>