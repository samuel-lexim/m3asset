<?php
$postId = get_the_ID();

if ( isset( $args ) && $args ) {
	?>

    <div class="title_section">
        <?php
        $bg = $args['background'] ?? getDefaultImg();
        $underlineColor = $args['underline_color'] ?? '#337EA3';
        ?>

        <div class="_inner" style="background-image: url(<?= $bg ?>)">
            <div class="_text_wrap">
            <?php if ( $args['the_title'] ) { ?>
                <h1 class="_title" style="--underline-color: <?= $underlineColor ?>"><?= $args['the_title'] ?></h1>
            <?php } ?>

            <?php if ( $args['description'] ) { ?>
                <p class="_description"><?= $args["description"] ?></p>
            <?php } ?>
            </div>

        </div>
    </div>

<?php }