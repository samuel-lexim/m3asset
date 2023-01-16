<?php
$postId = get_the_ID();

if (isset($args) && $args && $args['box_repeater'] && is_array($args['box_repeater'])) {
    $box_item_background = $args['box_background'] ?? '';
    $imagePosition = $args["box_image_position"] ?? '';
    ?>
    <div class="box_grid_section tb_pad">
        <div class="_inner lr_pad">
            <div class="box_grid_flex <?= $imagePosition . ' ' . $box_item_background ?>">
                <?php
                $i = 1;
                foreach ($args['box_repeater'] as $grid) {
                    $headingId = $grid['box_item_heading'] ? createSlug($grid['box_item_heading']) : 'noID';
                    $heading = $grid['box_item_heading'] ?? '';
                    ?>
                    <div id="<?= $headingId ?>" class="box_item" data-index="<?= $i ?>">

                        <?php if ($grid['box_item_image']) { ?>
                            <div class="_box_img">
                                <img src="<?= $grid['box_item_image'] ?>" alt="<?= $heading ?>" />
                            </div>
                        <?php } ?>


                        <div class="_content">
                            <?php if ($heading) { ?>
                                <h3 class="_box_item_heading darkBlue s20"><?= $heading ?></h3>
                            <?php } ?>

                            <?php if ($grid['box_item_summary']) { ?>
                                <h4 class="_box_item_summary s16"><?= $grid['box_item_summary'] ?></h4>
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