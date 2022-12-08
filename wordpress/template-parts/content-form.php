<div class="form <?php echo $args['class-form']; ?>">
    <form action="#">
    <img src="<?php echo get_template_directory_uri() ?>/images/icons/mail-input.svg" alt="">
    <input type="email" class="form-control" placeholder="Enter your email">
    <input type="submit" class="form-submit" value="Join waitlist now">
    </form>
    <?php echo do_shortcode('[vl_form widget='.'embedForm2'.']')?>
</div>