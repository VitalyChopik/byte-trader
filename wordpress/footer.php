</main>
    <footer class="footer">
        <div class="footer__container">
            <div class="footer__block">
                <div class="footer__logo">
                    <?php 
                    if( has_custom_logo() ){
                        $custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
                        ?>
                        <img src="<?php echo $custom_logo__url[0]?>" alt="logo" >
                        <?php
                    }?>
                </div>
                <div class="footer__social">
                <?php
                if( have_rows('social', 'option') ):
                    while( have_rows('social', 'option') ) : the_row();
                        ?>
                        <a href="<?php the_sub_field('link')?>" targer="_blank" class="footer__social-link"><span><?php the_sub_field('social_name')?></span><img src="<?php echo get_template_directory_uri() ?>/images/icons/footer__arrow.svg" alt=""></a>
                        <?php
                    endwhile;
                endif;
                ?>
                </div>
                <div class="footer__additional-page">
                <?php echo get_the_privacy_policy_link();?>
                </div>
                <div class="footer__copy">
                ©<?php echo date ("Y");?> byte trading, Inc.
                </div>
            </div>
        </div>
    </footer>
  </div>
  <?php wp_footer();?>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
    </script>
</body>

</html>