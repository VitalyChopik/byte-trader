<?php get_header();?>
    <div class="privacy__content">
        <div class="privacy__container">
            <div class="privacy__logo">
            <?php the_custom_logo();?>
            </div>
            <h1 class="privacy__title"><?php the_title();?></h1>
            <div class="privacy__block">
                <?php the_content();?>
            </div>
        </div>
    </div>
<?php get_footer();?>