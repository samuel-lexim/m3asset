<?php
$postId = get_the_ID();

if (isset($args) && $args && $args['box_repeater'] && is_array($args['box_repeater'])) {
    $section_box_background = $args['section_box_background'] ?? '';
    $box_item_background = $args['box_background'] ?? '';
    $imagePosition = $args["box_image_position"] ?? '';
    $darkBlueArrow = getDefaultImg('arrow_darkBlue_16x9.svg');
    $darkBlueClose = getDefaultImg('xCloseDarkBlue.svg');

    ?>
    <div class="box_grid_section <?= esc_attr($section_box_background) ?>">
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

                            <?php if ($grid['box_item_summary']) { ?>
                                <h4 class="_box_item_summary s16 lh_1875"><?= $grid['box_item_summary'] ?></h4>
                            <?php } ?>

                            <?php if ($grid['box_item_read_more_content']) {
                                $readMoreContent = trim($grid['box_item_read_more_content']);
                                if ($readMoreContent) {
                                ?>
                                <div class="_readMoreButton transparentButton">
                                    <?= 'Read More' ?>
                                    <img class="_arrow_svg" src="<?= esc_url($darkBlueArrow) ?>" alt="Read more" />
                                </div>
                                <div class="_readMorePopUp">
                                    <div class="_readMoreInner">
                                        <div class="_xClosePopup">
                                            <img  src="<?= esc_url($darkBlueClose) ?>" alt="close" />
                                        </div>
                                        <div class="__content"><?= $readMoreContent ?></div>
                                    </div>
                                </div>
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