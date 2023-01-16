<?php
$postId = get_the_ID();

if ( isset( $args ) && $args ) {
	?>

    <div class="summary_section">
        <?php
            $defaultBg = $args['summary_background'] ?? getDefaultImg('summary-map.svg');
        ?>

        <div class="_inner">

            <div class="_content_wrap">
            <?php if ( $args['summary_heading'] ) { ?>
                <h3 class="_summary_heading darkBlue s24"><?= $args['summary_heading'] ?></h3>
            <?php } ?>

            <?php if ( $args['summary_content'] ) { ?>
                <p class="_summary_content"><?= $args["summary_content"] ?></p>
            <?php } ?>
            </div>

        </div>
    </div>

<?php }