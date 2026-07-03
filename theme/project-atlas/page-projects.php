<?php
/*
Template Name: Projects
*/
get_header();
?>

<section class="atlas-page-hero">
  <div class="atlas-container">
    <h1 class="atlas-page-title">Projects</h1>
    <p>Selected project areas described generally to avoid exposing proprietary information.</p>
  </div>
</section>

<main class="atlas-section">
  <div class="atlas-container">
    <div class="atlas-grid atlas-grid-2">
      <?php
      $projects = new WP_Query(array(
          'post_type' => 'atlas_project',
          'posts_per_page' => -1,
          'post_status' => 'publish',
          'orderby' => 'menu_order date',
          'order' => 'ASC',
      ));

      if ($projects->have_posts()) :
          while ($projects->have_posts()) : $projects->the_post(); ?>
            <a class="atlas-card atlas-card-link" href="<?php the_permalink(); ?>">
              <h3><?php the_title(); ?></h3>
              <p><?php echo esc_html(get_the_excerpt()); ?></p>
            </a>
          <?php endwhile;
          wp_reset_postdata();
      else : ?>
        <div class="atlas-card"><h3>No projects yet</h3><p>Add projects in the WordPress admin under Projects.</p></div>
      <?php endif; ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
