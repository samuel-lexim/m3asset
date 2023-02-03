<?php
$postId = get_the_ID();

if ( isset( $args ) && $args ) {
	?>

    <div class="title_section">
        <?php
        $bg = $args['background'] ?? getDefaultImg();
        $mobileBg = $args['mobile_background'] ?? getDefaultImg('default-hero-mobile.jpg');
        ?>

        <div class="_bg_desktop" style="background-image: url(<?= esc_url($bg) ?>)"></div>

        <div class="_bg_mobile">
            <img src="<?= esc_url($mobileBg) ?>" alt="<?= esc_attr($args['the_title']) ?>" />
        </div>

        <div class="_text_wrap lr_pad">
            <?php if ( $args['the_title'] ) { ?>
                <h1 class="_title <?= esc_attr($args['underline_color']) ?>"><?= esc_html($args['the_title']) ?></h1>
            <?php } ?>

            <?php if ( $args['description'] ) { ?>
                <div class="_description"><?= $args["description"] ?></div>
            <?php } ?>
        </div>

    </div>

<?php }