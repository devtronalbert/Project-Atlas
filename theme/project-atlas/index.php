<?php
/**
 * Project Atlas fallback template.
 */
get_header();
?>

<section class="atlas-page-hero">
  <div class="atlas-container">
    <h1 class="atlas-page-title"><?php bloginfo('name'); ?></h1>
    <p><?php bloginfo('description'); ?></p>
  </div>
</section>

<main class="atlas-page-content">
  <?php
  if (have_posts()) :
      while (have_posts()) :
          the_post();
          the_content();
      endwhile;
  else :
      echo '<p>Welcome to Project Atlas.</p>';
  endif;
  ?>
</main>

<?php get_footer(); ?>
