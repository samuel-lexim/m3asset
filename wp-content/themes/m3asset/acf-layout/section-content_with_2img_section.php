<?php
$postId = get_the_ID();

if (isset($args) && $args) {
    ?>

    <div class="content2images_section tb_pad">
        <?php
        $defaultBg = $args['summary_background'] && $args['summary_background'] !== ''
            ? $args['summary_background'] : getDefaultImg('summary-map.svg');
        $quoteIcon = getDefaultImg('quote.svg');
        ?>


        <div class="_inner lr_pad">
            <div class="_content_wrap">
                <div class="_col1">
                    <?php if ($args['content2img_heading1']) { ?>
                        <h2 class="content2img_heading __heading1 s32 fw700"><?= esc_html($args['content2img_heading1']) ?></h2>
                    <?php } ?>

                    <?php if ($args['content2img_heading2']) { ?>
                        <h2 class="content2img_heading __heading2 s32 fw700"><?= esc_html($args['content2img_heading2']) ?></h2>
                    <?php } ?>

                    <?php if ($args['content2img_summary']) { ?>
                        <div class="content2img_summary">
                            <?= esc_textarea($args["content2img_summary"]) ?>
                        </div>
                    <?php } ?>
                </div>

                <?php if ($args['content2img_image1']) { ?>
                    <div class="_col2">
                        <img src="<?= esc_url($args['content2img_image1']) ?>" alt="<?= esc_attr($args['content2img_heading1']) ?>"/>
                    </div>
                <?php } ?>

                <?php if ($args['content2img_image2']) { ?>
                    <div class="_col3">
                        <img src="<?= esc_url($args['content2img_image2']) ?>" alt="<?= esc_attr($args['content2img_heading2']) ?>"/>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>

<?php }