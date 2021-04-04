<?php if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) &&  basename( $_SERVER['SCRIPT_FILENAME'] ) == 'comments.php' ): ?>

    <?php die(); ?>

<?php endif; ?>

<?php if ( post_password_required() ): ?>

    <p><?php _e('Se necesita contraseña para visualizar este contenido', 'slan'); ?></p>
    <?php return; ?>
    
<?php endif ?>


<div id="comments">
    <?php if ( get_comments_number() ): ?>

        <h3 class="comments-title"><?php comments_number( __('Escribe el primer comentario', 'slan'), __('Un comentario', 'slan'), __('% comentarios', 'slan') ); ?></h3>
        <ol id="comments-list">
            <?php wp_list_comments(); ?>
        </ol><!-- /#comments-list -->

        <?php if ( get_comment_pages_count() > 1 && get_option('page_comments') ): ?>

            <div class="row">
                <div class="col">
                    <div class="post-navigation">
                        <nav class="nav justify-content-between">
                            <div class="before-posts-link">
                                <?php previous_comments_link(__('<i class="fa fa-arrow-left" aria-hidden="true"></i> Comentarios anteriores', 'slan')); ?>
                            </div>
                            <div class="next-posts-link">
                                <?php next_comments_link( __('Comentarios siguientes<i class="fa fa-arrow-right" aria-hidden="true"></i>', 'slan') ); ?>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            
        <?php endif ?>
        
    <?php endif ?>

    <?php comment_form(); ?>
</div><!-- /#comments -->