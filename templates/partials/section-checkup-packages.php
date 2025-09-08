<?php
// Check if the main repeater field has rows of data.
if (have_rows('lp_checkup_packages')) :
?>
<section id="checkup-packages" class="mb-5">
    <div class="section-title">
        <h2>Check-Up Paketlerimiz</h2>
        <p>Size en uygun paketi seçerek sağlığınız için önemli bir adım atın.</p>
    </div>
    
    <div class="row">
        <?php 
        // Loop through the rows of data for the main repeater.
        while (have_rows('lp_checkup_packages')) : the_row();
            // Get sub field values.
            $package_title = get_sub_field('lp_package_title');
            $package_gender = get_sub_field('lp_package_gender');
            $package_image = get_sub_field('lp_package_image');
            $package_description = get_sub_field('lp_package_description');
            $package_modal_id = get_sub_field('lp_package_modal_id');
            // NOTE: Price is intentionally hardcoded as requested.
            $package_price = '1.500 ₺'; // Example price, adjust as needed.
        ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 text-center package-card package-<?php echo esc_attr($package_gender); ?>">
                <div class="card-header clickable-header" data-bs-toggle="modal" data-bs-target="#<?php echo esc_attr($package_modal_id); ?>">
                    <?php if ($package_image) : ?>
                        <img src="<?php echo esc_url($package_image); ?>" alt="<?php echo esc_attr($package_title); ?> Görseli">
                    <?php endif; ?>
                    <h3><?php echo esc_html($package_title); ?></h3>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo esc_html($package_description); ?></p>
                    <h4 class="price"><?php echo esc_html($package_price); ?></h4>
                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#<?php echo esc_attr($package_modal_id); ?>">Detayları Gör</button>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<!-- Modals -->
<?php 
// Loop again for the modals to ensure all cards are rendered before modals.
while (have_rows('lp_checkup_packages')) : the_row();
    $package_title = get_sub_field('lp_package_title');
    $package_modal_id = get_sub_field('lp_package_modal_id');
?>
<div class="modal fade" id="<?php echo esc_attr($package_modal_id); ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo esc_html($package_title); ?> Detayları</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <?php if (have_rows('lp_package_details')) : ?>
                    <div class="accordion modal-accordion" id="accordion-<?php echo esc_attr($package_modal_id); ?>">
                        <?php 
                        // Loop through the nested repeater for accordion items.
                        while (have_rows('lp_package_details')) : the_row();
                            $detail_title = get_sub_field('lp_detail_title');
                            $detail_description = get_sub_field('lp_detail_description');
                            $row_index = get_row_index(); // Main repeater index
                            $sub_row_index = get_sub_row_index(); // Nested repeater index
                            $collapse_id = 'collapse-' . $row_index . '-' . $sub_row_index;
                        ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse_id; ?>">
                                    <?php echo esc_html($detail_title); ?>
                                </button>
                            </h2>
                            <div id="<?php echo $collapse_id; ?>" class="accordion-collapse collapse" data-bs-parent="#accordion-<?php echo esc_attr($package_modal_id); ?>">
                                <div class="accordion-body">
                                    <?php echo esc_html($detail_description); ?>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>
<?php 
endwhile; 
// Reset Post Data
wp_reset_postdata();
endif; 
?>
