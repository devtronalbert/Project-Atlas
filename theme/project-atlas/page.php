<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <section class="atlas-page-hero">
    <div class="atlas-container">
      <h1 class="atlas-page-title"><?php the_title(); ?></h1>
      <?php $desc = atlas_page_description(''); if ($desc) : ?>
        <p><?php echo esc_html($desc); ?></p>
      <?php endif; ?>
    </div>
  </section>

  <main class="atlas-page-content">
    <?php the_content(); ?>
  </main>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
