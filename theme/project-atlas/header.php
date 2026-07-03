<?php if (!defined('ABSPATH')) { exit; } ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="atlas-header">
  <div class="atlas-nav-wrap">
    <a class="atlas-brand" href="<?php echo esc_url(home_url('/')); ?>">
      <span class="atlas-brand-mark">DA</span>
      <span>Devon Albert</span>
    </a>
    <button class="atlas-menu-toggle" type="button" aria-controls="atlas-menu" aria-expanded="false">Menu</button>
    <?php atlas_primary_menu(); ?>
  </div>
</header>
