<?php
$postId = get_the_ID();

if ( isset( $args ) && $args && $args['slide_list'] && is_array($args['slide_list']) ) { ?>

    <div class="slider_section <?= esc_attr($args['slider_text_color']) ?>">

        <div class="slider_section_slick dots_inner">
            <?php
            $whiteArrow = getDefaultImg('arrow_white.svg');

            foreach ($args['slide_list'] as $slide) {

            ?>

                <div class="slider_section_item" style="background-image: url(<?= esc_url($slide['slide_image']) ?>)">
                    <div class="_wrap lr_pad">
                        <div class="_inner">



                    <?php if ( $slide['slide_title'] ) { ?>
                        <h1 class="_title s40"><?= esc_html($slide['slide_title']) ?></h1>
                    <?php } ?>

                    <?php if ( $slide['slide_button_text'] ) { ?>
                        <a class="darkButton s16 fw600" href="<?= esc_url($slide['slide_button_link']) ?>">
                            <?= esc_html($slide['slide_button_text']) ?>
                            <img class="_arrow_svg" src="<?= esc_url($whiteArrow) ?>" alt="arrow"/>
                        </a>
                    <?php } ?>

                    <?php if ( $slide['slide_heading'] ) { ?>
                        <p class="_heading s20 blueSquare"><?= esc_html($slide["slide_heading"]) ?></p>
                    <?php } ?>

                    <?php if ( $slide['slide_content'] ) { ?>
                        <div class="_content s16"><?= esc_textarea($slide["slide_content"]) ?></div>
                    <?php } ?>
                        </div>

                    </div>
                </div>

            <?php } ?>

        </div>

    </div>

<?php } ?>