<?php
$postId = get_the_ID();

if ( isset( $args ) && $args ) {
	?>

    <div class="title_section">
        <?php
        $bg = $args['background'] ?? getDefaultImg();
        ?>

        <div class="_inner" style="background-image: url(<?= esc_url($bg) ?>)">
            <div class="_text_wrap lr_pad">
            <?php if ( $args['the_title'] ) { ?>
                <h1 class="_title <?= esc_attr($args['underline_color']) ?>"><?= esc_html($args['the_title']) ?></h1>
            <?php } ?>

            <?php if ( $args['description'] ) { ?>
                <p class="_description"><?= esc_html($args["description"]) ?></p>
            <?php } ?>
            </div>

        </div>
    </div>

<?php }