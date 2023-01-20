<?php
$postId = get_the_ID();

if (isset($args) && $args && $args['slider2cols_list'] && is_array($args['slider2cols_list'])) {
    $whiteArrow = getDefaultImg('arrow_white.svg');
    $count = count($args['slider2cols_list']);
    $noDot = $count == 1 ? 'noDots' : '';
    ?>

    <div class="slider_2cols_section <?= esc_attr($args['slider2cols_bg_left_col']) ?>">

        <div class="_left_col lr_pad">
            <?php if ($args['slider2cols_title']) { ?>
                <h1 class="_title s38 fw700"><?= esc_html($args['slider2cols_title']) ?></h1>
            <?php } ?>

            <?php if ($args['slider2cols_button_text']) { ?>
                <a class="blueButton s16 fw600" href="<?= esc_url($args['slider2cols_button_link']) ?>">
                    <?= esc_html($args['slider2cols_button_text']) ?>
                    <img class="_arrow_svg" src="<?= esc_url($whiteArrow) ?>" alt="arrow"/>
                </a>
            <?php } ?>
        </div>

        <div class="_right_col">
            <div class="slider_2cols_section_slick dots_inner white <?= esc_attr($noDot) ?>">
                <?php
                foreach ($args['slider2cols_list'] as $slide) { ?>

                    <div class="slider_2cols_section_item" style="background-image: url(<?= esc_url($slide['slider2cols_image']) ?>)">

                        <div class="lr_pad">

                            <div class="_wrap">
                                <?php if ($slide['slider2cols_heading']) { ?>
                                    <h2 class="_heading s32 fw600"><?= esc_html($slide["slider2cols_heading"]) ?></h2>
                                <?php } ?>

                                <?php if ($slide['slider2cols_content']) { ?>
                                    <div class="_content s16 fw300"><?= esc_textarea($slide["slider2cols_content"]) ?></div>
                                <?php } ?>
                            </div>

                        </div>

                    </div>

                <?php } ?>

            </div>
        </div>
    </div>

<?php } ?>