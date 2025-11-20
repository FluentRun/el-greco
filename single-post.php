                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              single-product.php
<?php
/**
 * FluentCart Single Product Template
 */

if (!defined('ABSPATH')) {
    exit;
}

use FluentCart\Api\Resource\ShopResource;
use FluentCart\Api\StoreSettings;
use FluentCart\App\Helpers\Helper;
use FluentCart\App\Modules\Data\ProductDataSetup;
use FluentCart\App\Services\Renderer\ProductListRenderer;
use FluentCart\App\Services\Renderer\ProductRenderer;
use FluentCart\Framework\Support\Arr;

global $post;

$product = $GLOBALS['fct_product'] ?? null;

if (!$product && $post instanceof WP_Post) {
    $product = ProductDataSetup::getProductModel($post->ID);
}

if (!$product || !$product->detail) {
    the_content();
    return;
}

$storeSettings = new StoreSettings();

$renderer = new ProductRenderer($product, [
    'view_type'   => $storeSettings->get('variation_view', 'both'),
    'column_type' => $storeSettings->get('variation_columns', 'masonry'),
]);

$description = '';
if ($post instanceof WP_Post) {
    $description = apply_filters('the_content', $post->post_content);
}

$variants = [];
if ($product->variants && !$product->variants->isEmpty()) {
    $variants = $product->variants->sortBy('serial_index')->values();
}

?>
<div class="fc-post-type-debug" aria-hidden="true" style="position:absolute;left:-9999px;">
    <?php echo esc_html(get_post_type()); ?>
</div>
<style>
    .fc-fiverr-card {
        border-radius: 4px;
    }

    .fc-fiverr-sticky {
        position: sticky;
        top: 1.5rem;
        z-index: 10;
    }

    .fc-fiverr-sidebar {
        max-width: 360px;
        margin-left: auto;
    }

    .fc-fiverr-section + .fc-fiverr-section {
        margin-top: 1.5rem;
    }
</style>

<div class="fc-single-product-page fc-single-product-page--fiverr" data-fluent-cart-single-product-page>
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-lg-8">
                <section class="card fc-fiverr-card shadow-sm border-0 p-4 mb-0 fc-fiverr-section" id="fc-product-title">
                    <div class="d-flex flex-column gap-2">
                        <div class="d-flex align-items-center gap-3 flex-wrap">
                            <div class="flex-grow-1">
                                <?php $renderer->renderTitle(); ?>
                            </div>
                            <div class="text-muted small">
                                <?php $renderer->renderStockAvailability(); ?>
                            </div>
                        </div>
                        <div class="text-secondary">
                            <?php $renderer->renderExcerpt(); ?>
                        </div>
                    </div>
                </section>

                <section class="card fc-fiverr-card shadow-sm border-0 p-4 fc-fiverr-section" id="fc-product-gallery" data-fluent-cart-product-gallery-area>
                    <?php $renderer->renderGallery(); ?>
                </section>

                <section class="card fc-fiverr-card shadow-sm border-0 p-4 fc-fiverr-section" id="fc-product-about">
                    <header class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="h5 mb-0"><?php esc_html_e('About this product', 'fluent-cart'); ?></h2>
                    </header>
                    <div class="fc-product-description">
                        <?php echo $description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </div>
                </section>

                <section class="card fc-fiverr-card shadow-sm border-0 p-4 fc-fiverr-section" id="fc-product-seller">
                    <header class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="h5 mb-0"><?php esc_html_e('About the seller', 'fluent-cart'); ?></h2>
                    </header>
                    <div class="fc-product-seller-info" data-fluent-cart-seller-info>
                        <?php do_action('fluent_cart_product_seller_info', $product); ?>
                    </div>
                </section>

                <section class="card fc-fiverr-card shadow-sm border-0 p-4 fc-fiverr-section" id="fc-product-faq">
                    <header class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="h5 mb-0"><?php esc_html_e('FAQ', 'fluent-cart'); ?></h2>
                    </header>
                    <div class="accordion" id="fc-product-faq-accordion" data-fluent-cart-faq>
                        <?php do_action('fluent_cart_product_faq', $product); ?>
                    </div>
                </section>

                <?php if (!empty($variants)) : ?>
                    <section class="card fc-fiverr-card shadow-sm border-0 p-4 fc-fiverr-section" id="fc-product-packages">
                        <header class="mb-3">
                            <h2 class="h5 mb-1"><?php esc_html_e("What's included", 'fluent-cart'); ?></h2>
                            <p class="text-muted mb-0"><?php esc_html_e('Compare packages to choose the best fit for you.', 'fluent-cart'); ?></p>
                        </header>
                        <div class="fc-package-grid" role="list">
                            <?php foreach ($variants as $variant) :
                                $features = [];
                                $featureKeys = ['features', 'deliverables', 'what_you_get', 'items'];
                                foreach ($featureKeys as $featureKey) {
                                    $data = Arr::get($variant->other_info, $featureKey, []);
                                    if (is_string($data)) {
                                        $data = array_filter(array_map('trim', preg_split('/[\r\n]+|,/', $data)));
                                    }
                                    if (is_array($data)) {
                                        $features = array_merge($features, $data);
                                    }
                                }
                                $features = array_filter(array_unique(array_map('trim', $features)));
                                $packageDescription = Arr::get($variant->other_info, 'description', '');
                                ?>
                                <article class="card fc-fiverr-card border-0 shadow-sm mb-3" role="listitem">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h3 class="h6 mb-0"><?php echo esc_html($variant->variation_title); ?></h3>
                                            <div class="text-end">
                                                <div class="fw-bold" aria-label="<?php esc_attr_e('Package price', 'fluent-cart'); ?>">
                                                    <?php echo esc_html(Helper::toDecimal($variant->item_price)); ?>
                                                </div>
                                                <?php if ($variant->compare_price && $variant->compare_price > $variant->item_price) : ?>
                                                    <small class="text-muted text-decoration-line-through"><?php echo esc_html(Helper::toDecimal($variant->compare_price)); ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php if (!empty($packageDescription)) : ?>
                                            <p class="text-muted mb-3"><?php echo wp_kses_post($packageDescription); ?></p>
                                        <?php endif; ?>
                                        <?php if (!empty($features)) : ?>
                                            <ul class="list-unstyled mb-3">
                                                <?php foreach ($features as $feature) : ?>
                                                    <li class="d-flex align-items-center gap-2 mb-2">
                                                        <span class="badge bg-success-subtle text-success rounded-pill">✓</span>
                                                        <span><?php echo esc_html($feature); ?></span>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                        <div class="d-flex justify-content-end">
                                            <a class="btn btn-outline-primary" href="#fc-product-summary" data-fluent-cart-scroll-to-summary data-variation-id="<?php echo esc_attr($variant->id); ?>">
                                                <?php esc_html_e('View package details', 'fluent-cart'); ?>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endif; ?>

                <section class="card fc-fiverr-card shadow-sm border-0 p-4 fc-fiverr-section" id="fc-product-reviews">
                    <header class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="h5 mb-0"><?php esc_html_e('Reviews', 'fluent-cart'); ?></h2>
                    </header>
                    <div class="fc-product-reviews">
                        <?php comments_template(); ?>
                    </div>
                </section>

                <?php
                $relatedProducts = ShopResource::getSimilarProducts($product->ID, false);
                $relatedList = $relatedProducts ? Arr::get($relatedProducts, 'products') : null;
                if ($relatedList && $relatedList->count()) :
                    ob_start();
                    (new ProductListRenderer($relatedList, __('Related Products', 'fluent-cart'), 'fc-similar-product-list-container fc-product-section--related'))->render();
                    $relatedMarkup = ob_get_clean();
                    ?>
                    <section class="fc-fiverr-section" id="fc-product-related">
                        <?php echo $relatedMarkup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </section>
                <?php endif; ?>
            </div>

            <div class="col-lg-4">
                <aside class="fc-fiverr-sidebar fc-fiverr-sticky" id="fc-product-summary" data-fluent-cart-product-summary>
                    <div class="card fc-fiverr-card shadow-sm border-0" data-fluent-cart-sticky-summary>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="fw-bold text-muted text-uppercase small"><?php esc_html_e('Starting at', 'fluent-cart'); ?></div>
                                <div class="text-end">
                                    <?php $renderer->renderPrices(); ?>
                                </div>
                            </div>
                            <div class="mb-3 text-secondary small">
                                <?php $renderer->renderExcerpt(); ?>
                            </div>
                            <div class="mb-4">
                                <?php $renderer->renderBuySection(); ?>
                            </div>
                            <div class="d-flex align-items-center gap-2 text-success small mb-3">
                                <span class="badge bg-success-subtle text-success rounded-pill">✓</span>
                                <?php $renderer->renderStockAvailability(); ?>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
