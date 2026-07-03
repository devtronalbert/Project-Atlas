<?php
/*
Template Name: Contact
*/
get_header();
?>

<section class="atlas-page-hero">
  <div class="atlas-container">
    <h1 class="atlas-page-title">Contact</h1>
    <p>Open to conversations around enterprise architecture, infrastructure engineering, systems integration, software development, and technical leadership.</p>
  </div>
</section>

<main class="atlas-section">
  <div class="atlas-container">
    <div class="atlas-grid atlas-grid-3">
      <div class="atlas-card">
        <h3>Email</h3>
        <p><a href="mailto:<?php echo esc_attr(atlas_email()); ?>"><?php echo esc_html(atlas_email()); ?></a></p>
      </div>
      <div class="atlas-card">
        <h3>LinkedIn</h3>
        <p><a href="<?php echo esc_url(atlas_linkedin_url()); ?>" target="_blank" rel="noopener">Connect on LinkedIn</a></p>
      </div>
      <div class="atlas-card">
        <h3>GitHub</h3>
        <p><a href="<?php echo esc_url(atlas_github_url()); ?>" target="_blank" rel="noopener">View GitHub</a></p>
      </div>
    </div>

    <div class="atlas-page-content" style="padding-left:0;padding-right:0;">
      <?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
