<footer>
    <div class="footer-inner">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        
                        <?php 

                            if( is_active_sidebar('sidebar-footer-izq') ){

                                dynamic_sidebar('sidebar-footer-izq');

                            } 

                         ?>
                         
                    </div>

                    <div class="col-md-4">
                        <?php 

                            if( is_active_sidebar('sidebar-footer-cent') ){

                                dynamic_sidebar('sidebar-footer-cent');

                            } 

                         ?>
                    </div>

                    <div class="col-md-4">
                        <?php 

                            if( is_active_sidebar('sidebar-footer-der') ){

                                dynamic_sidebar('sidebar-footer-der');

                            } 

                         ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>