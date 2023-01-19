<?php
$postId = get_the_ID();
?>

<?php if (get_the_content()) {
    $contact_background_image = get_field('contact_background_image');
    $contact_background_color = get_field('contact_background_color');
    $contact_label_color = get_field('contact_label_color');
    $show_paper_airplane = get_field('show_paper_airplane');
    $icon = getDefaultImg('contact_mail.svg');
    ?>

    <div class="contact_section <?= esc_attr('bg_' . $contact_background_color . ' label_' . $contact_label_color .
        ($contact_background_image ? ' _has_bg' : '')) ?>">

        <div class="_container" style="background-image: url('<?= esc_url($contact_background_image) ?>')">
            <div class="lr_pad">
                <div class="_wrap ">
                    <h1 class="_h1Title fw600 s32 <?= $show_paper_airplane ? 'paper_airplane' : '' ?>">
                        <?= esc_html(get_the_title()) ?>
                        <?php if ($show_paper_airplane) { ?>
                            <img class="airPlaneSvg" src="<?= esc_url($icon) ?>" alt="Contact Us"/>
                        <?php } ?>
                    </h1>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>

    </div>

<?php }
