<?php
$postId = get_the_ID();

if (isset($args) && $args) {
    ?>

    <div class="summary_section tb_pad">
        <?php
        $defaultBg = $args['summary_background'] && $args['summary_background'] !== ''
            ? $args['summary_background'] : getDefaultImg('summary-map.svg');
        $quoteIcon = getDefaultImg('quote.svg');
        ?>

        <div class="_svg_bg">
            <img src="<?= esc_url($defaultBg) ?>" alt="Welcome to M3 Investments"/>
        </div>

        <div class="_inner lr_pad">
            <div class="_content_wrap">
                <?php if ($args['summary_heading']) { ?>
                    <h3 class="_summary_heading darkBlue s24"><?= esc_html($args['summary_heading']) ?></h3>
                <?php } ?>

                <?php if ($args['summary_content']) { ?>
                    <div class="_summary_content">
                        <p><?= esc_html($args["summary_content"]) ?></p>

                        <?php if ($args['show_quote_icon']) { ?>
                            <div class="_quote_icon">
                                <img class="_quote_svg" src="<?= esc_url($quoteIcon) ?>" alt="quote"/>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>

<?php }