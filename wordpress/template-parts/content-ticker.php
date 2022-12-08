<div class="ticker">
    <div class="ticker__block">
        <?php $count = 1; while ($count <= $args['max-count']) { $count++;?>
            <div class="ticker__box"><?php echo $args['ticker-value']; ?></div>
        <?php }?>
    </div>
</div>