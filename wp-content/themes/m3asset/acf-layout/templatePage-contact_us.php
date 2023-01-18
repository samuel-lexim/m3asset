<?php
$postId = get_the_ID();
?>

<?php if (get_the_content()) {
    $contact_background_image = get_field('contact_background_image');
    $contact_background_color = get_field('contact_background_color');
    $contact_label_color = get_field('contact_label_color');
    $icon = getDefaultImg('contact_mail.svg');
    ?>

    <div class="contact_section <?= esc_attr('bg_' . $contact_background_color . ' label_' . $contact_label_color) ?>">

        <div class="_container" style="background-image: url('<?= esc_url($contact_background_image) ?>')">
            <div class="lr_pad">
                <div class="_wrap ">
                    <h1 class="_h1Title fw600 s32">
                        <?= esc_html(get_the_title()) ?>
                        <img src="<?= esc_url($icon) ?>" alt="Contact Us"/>
                    </h1>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>

    </div>


<?php }
