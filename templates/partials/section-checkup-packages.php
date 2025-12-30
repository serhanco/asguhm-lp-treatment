<?php
// This variable is expected to be defined in the parent template (single_treatment-lp.php)
// It provides the URL to the plugin's root directory.
global $plugin_dir, $translations, $site;

// Static package data array. No longer dependent on ACF.
$packages = [
    // Women
    [
        'title_key' => 'women_classic_title',
        'gender' => 'women',
        'image' => 'women_classic.webp',
        'description_key' => 'women_classic_description',
        'price' => '',
        'modal_id' => 'modal-women-classic',
        'details' => [
            ['title_key' => 'women_classic_detail_1_title', 'description_key' => 'women_classic_detail_1_description'],
            ['title_key' => 'women_classic_detail_2_title', 'description_key' => 'women_classic_detail_2_description'],
            ['title_key' => 'women_classic_detail_3_title', 'description_key' => 'women_classic_detail_3_description'],
        ]
    ],
    [
        'title_key' => 'women_gold_title',
        'gender' => 'women',
        'image' => 'women_gold.webp',
        'description_key' => 'women_gold_description',
        'price' => '',
        'modal_id' => 'modal-women-gold',
        'details' => [
            ['title_key' => 'women_gold_detail_1_title', 'description_key' => 'women_gold_detail_1_description'],
            ['title_key' => 'women_gold_detail_2_title', 'description_key' => 'women_gold_detail_2_description'],
            ['title_key' => 'women_gold_detail_3_title', 'description_key' => 'women_gold_detail_3_description'],
        ]
    ],
    [
        'title_key' => 'women_executive_title',
        'gender' => 'women',
        'image' => 'women_executive.webp',
        'description_key' => 'women_executive_description',
        'price' => '',
        'modal_id' => 'modal-women-executive',
        'details' => [
            ['title_key' => 'women_executive_detail_1_title', 'description_key' => 'women_executive_detail_1_description'],
            ['title_key' => 'women_executive_detail_2_title', 'description_key' => 'women_executive_detail_2_description'],
            ['title_key' => 'women_executive_detail_3_title', 'description_key' => 'women_executive_detail_3_description'],
        ]
    ],
    // Men
    [
        'title_key' => 'men_classic_title',
        'gender' => 'men',
        'image' => 'men_classic.webp',
        'description_key' => 'men_classic_description',
        'price' => '',
        'modal_id' => 'modal-men-classic',
        'details' => [
            ['title_key' => 'men_classic_detail_1_title', 'description_key' => 'men_classic_detail_1_description'],
            ['title_key' => 'men_classic_detail_2_title', 'description_key' => 'men_classic_detail_2_description'],
            ['title_key' => 'men_classic_detail_3_title', 'description_key' => 'men_classic_detail_3_description'],
        ]
    ],
    [
        'title_key' => 'men_gold_title',
        'gender' => 'men',
        'image' => 'men_gold.webp',
        'description_key' => 'men_gold_description',
        'price' => '',
        'modal_id' => 'modal-men-gold',
        'details' => [
            ['title_key' => 'men_gold_detail_1_title', 'description_key' => 'men_gold_detail_1_description'],
            ['title_key' => 'men_gold_detail_2_title', 'description_key' => 'men_gold_detail_2_description'],
            ['title_key' => 'men_gold_detail_3_title', 'description_key' => 'men_gold_detail_3_description'],
        ]
    ],
    [
        'title_key' => 'men_executive_title',
        'gender' => 'men',
        'image' => 'men_executive.webp',
        'description_key' => 'men_executive_description',
        'price' => '',
        'modal_id' => 'modal-men-executive',
        'details' => [
            ['title_key' => 'men_executive_detail_1_title', 'description_key' => 'men_executive_detail_1_description'],
            ['title_key' => 'men_executive_detail_2_title', 'description_key' => 'men_executive_detail_2_description'],
            ['title_key' => 'men_executive_detail_3_title', 'description_key' => 'men_executive_detail_3_description'],
        ]
    ],
];
?>
<section id="checkup-packages" class="mb-5">
    <div class="section-title">
        <h2><?= $translations["checkup_section_title"][$site] ?></h2>
        <?php if (!empty($translations["checkup_section_subtitle"][$site])) : ?>
        <p><?= $translations["checkup_section_subtitle"][$site] ?></p>
        <?php endif; ?>
    </div>
    
    <div class="row">
        <?php foreach ($packages as $package) : ?>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 text-center package-card package-<?php echo esc_attr($package['gender']); ?>">
                    <div class="card-header clickable-header" data-bs-toggle="modal" data-bs-target="#<?php echo esc_attr($package['modal_id']); ?>">
                        <?php if (isset($plugin_dir)) : ?>
                        <img src="<?php echo esc_url($plugin_dir . 'assets/img/ckp_packages/' . $package['image']); ?>" alt="<?php echo esc_attr($translations[$package['title_key']][$site]); ?> Package Image">
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($translations[$package['description_key']][$site])) : ?>
                        <p class="card-text"><?php echo esc_html($translations[$package['description_key']][$site]); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($package['price'])) : ?>
                        <h4 class="price"><?php echo esc_html($package['price']); ?></h4>
                        <?php endif; ?>
                        
                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#<?php echo esc_attr($package['modal_id']); ?>"><?= $translations["Package Details"][$site] ?></button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Modals -->
<?php foreach ($packages as $index => $package) : ?>
<div class="modal fade" id="<?php echo esc_attr($package['modal_id']); ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo esc_html($translations[$package['title_key']][$site]); ?> Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="accordion modal-accordion" id="accordion-<?php echo esc_attr($package['modal_id']); ?>">
                    <?php foreach ($package['details'] as $sub_index => $detail) : 
                        $collapse_id = 'collapse-' . $index . '-' . $sub_index;
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse_id; ?>">
                                <?php echo esc_html($translations[$detail['title_key']][$site]); ?>
                            </button>
                        </h2>
                        <div id="<?php echo $collapse_id; ?>" class="accordion-collapse collapse" data-bs-parent="#accordion-<?php echo esc_attr($package['modal_id']); ?>">
                            <div class="accordion-body">
                                <?php echo esc_html($translations[$detail['description_key']][$site]); ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $translations["modal_close_button"][$site] ?></button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
