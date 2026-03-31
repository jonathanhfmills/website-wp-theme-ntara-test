<?php defined( 'ABSPATH' ) || exit; ?>
<?php get_header() ?>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h1 class="mb-4"><?php woocommerce_page_title() ?></h1>
      <?php get_template_part( 'template-parts/content', 'archive-product' ) ?>
    </div>
    <div class="col-md-4 order-first">
      <?php get_sidebar( 'woo' ) ?>
    </div>
  </div>
</div>

<?php get_footer() ?>
