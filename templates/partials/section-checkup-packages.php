<?php
// This variable is expected to be defined in the parent template (single_treatment-lp.php)
// It provides the URL to the plugin's root directory.
global $plugin_dir, $translations, $site;

// Dynamic package data array. Details are now loaded from CSV files.
$packages = [
    // Women
    [
        'title_key' => 'women_classic_title',
        'gender' => 'women',
        'image' => 'women_classic.webp',
        'description_key' => 'women_classic_description',
        'price' => '',
        'modal_id' => 'modal-women-classic',
        'details' => parse_package_csv('Classic Women.csv')
    ],
    [
        'title_key' => 'women_gold_title',
        'gender' => 'women',
        'image' => 'women_gold.webp',
        'description_key' => 'women_gold_description',
        'price' => '',
        'modal_id' => 'modal-women-gold',
        'details' => parse_package_csv('Gold Women.csv')
    ],
    [
        'title_key' => 'women_executive_title',
        'gender' => 'women',
        'image' => 'women_executive.webp',
        'description_key' => 'women_executive_description',
        'price' => '',
        'modal_id' => 'modal-women-executive',
        'details' => parse_package_csv('Executive Women.csv')
    ],
    // Men
    [
        'title_key' => 'men_classic_title',
        'gender' => 'men',
        'image' => 'men_classic.webp',
        'description_key' => 'men_classic_description',
        'price' => '',
        'modal_id' => 'modal-men-classic',
        'details' => parse_package_csv('Classic Men.csv')
    ],
    [
        'title_key' => 'men_gold_title',
        'gender' => 'men',
        'image' => 'men_gold.webp',
        'description_key' => 'men_gold_description',
        'price' => '',
        'modal_id' => 'modal-men-gold',
        'details' => parse_package_csv('Gold Men.csv')
    ],
    [
        'title_key' => 'men_executive_title',
        'gender' => 'men',
        'image' => 'men_executive.webp',
        'description_key' => 'men_executive_description',
        'price' => '',
        'modal_id' => 'modal-men-executive',
        'details' => parse_package_csv('Executive Men.csv')
    ],
];
?>
<div id="checkup-packages">
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
</div>

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
                <?php if (!empty($package['details'])) : ?>
                <div class="accordion modal-accordion" id="accordion-<?php echo esc_attr($package['modal_id']); ?>">
                    <?php foreach ($package['details'] as $sub_index => $detail) : 
                        $collapse_id = 'collapse-' . esc_attr($package['modal_id']) . '-' . $sub_index;
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse_id; ?>">
                                <?php echo esc_html($detail['title']); ?>
                            </button>
                        </h2>
                        <div id="<?php echo $collapse_id; ?>" class="accordion-collapse collapse" data-bs-parent="#accordion-<?php echo esc_attr($package['modal_id']); ?>">
                            <div class="accordion-body">
                                <?php if (!empty($detail['items'])) : ?>
                                    <ul>
                                        <?php foreach ($detail['items'] as $item) : ?>
                                            <li><?php echo esc_html($item); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php else : ?>
                    <p>Package details are not available at the moment. Please check back later.</p>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $translations["modal_close_button"][$site] ?></button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
