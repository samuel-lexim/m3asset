<?php
$postId = get_the_ID();

if (isset($args) && $args && $args['box_repeater'] && is_array($args['box_repeater'])) {
    $section_box_background = $args['section_box_background'] ?? '';
    $box_item_background = $args['box_background'] ?? '';
    $imagePosition = $args["box_image_position"] ?? '';
    ?>
    <div class="box_grid_popup_section <?= esc_attr($section_box_background) ?>">
        <div class="_inner lr_pad">
            <div class="box_grid_flex <?= esc_attr($imagePosition . ' ' . $box_item_background) ?>">
                <?php
                $i = 1;
                foreach ($args['box_repeater'] as $grid) {
                    $headingId = $grid['box_item_heading'] ? createSlug($grid['box_item_heading']) : 'noID';
                    $heading = $grid['box_item_heading'] ?? '';
                    ?>
                    <div id="<?= esc_attr($headingId) ?>"
                         class="box_item <?= esc_attr($grid['box_item_image_position']) ?>"
                         data-index="<?= esc_attr($i) ?>">

                        <?php if ($grid['box_item_image']) { ?>
                            <div class="_box_img">
                                <img src="<?= esc_url($grid['box_item_image']) ?>" alt="<?= esc_attr($heading) ?>"/>
                            </div>
                        <?php } ?>

                        <div class="_content">
                            <?php if ($heading) { ?>
                                <h3 class="_box_item_heading darkBlue s20"><?= esc_html($heading) ?></h3>
                            <?php } ?>


                            <?php if (is_array($grid['box_item_content_repeater']) && $grid['box_item_content_repeater']) { ?>
                                <!-- Popup -->
                                <?php foreach ($grid['box_item_content_repeater'] as $service) { ?>

                                    <?php if ($service['box_item_content_heading']) { ?>

                                    <div class="_heading_content_hover">
                                        <h4 class="_box_item_content_heading s16 fw300"><?= $service['box_item_content_heading'] ?></h4>

                                        <?php if (isset($service['box_item_content_popup']) && $service['box_item_content_popup']) { ?>
                                            <div class="_box_item_content_popup_wrap">
                                                <div class="fw400 s14 lh_185"><?= $service['box_item_content_popup'] ?></div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <?php } ?>

                                <?php } ?>

                            <?php } ?>

                        </div>



                    </div>

                    <?php
                    $i++;

                } ?>
            </div>
        </div>
    </div>
<?php } ?>