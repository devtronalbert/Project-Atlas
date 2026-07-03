<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <section class="atlas-page-hero">
    <div class="atlas-container">
      <div class="atlas-eyebrow">Project Area</div>
      <h1 class="atlas-page-title"><?php the_title(); ?></h1>
      <?php if (has_excerpt()) : ?>
        <p><?php echo esc_html(get_the_excerpt()); ?></p>
      <?php endif; ?>
    </div>
  </section>

  <main class="atlas-page-content">
    <?php the_content(); ?>
    <p style="margin-top:36px;"><a href="<?php echo esc_url(home_url('/projects/')); ?>">← Back to Projects</a></p>
  </main>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
