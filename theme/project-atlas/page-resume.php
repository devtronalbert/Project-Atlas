<?php
/*
Template Name: Resume
*/
get_header();
?>

<section class="atlas-page-hero">
  <div class="atlas-container">
    <h1 class="atlas-page-title">Resume</h1>
    <p>Download my resume or connect with me on LinkedIn.</p>
  </div>
</section>

<main class="atlas-section">
  <div class="atlas-container">
    <div class="atlas-resume-box">
      <div>
        <h2 style="margin-bottom:8px;">Devon Albert Resume</h2>
        <p class="atlas-lead" style="margin:0;">The resume link expects a file available at /resume.pdf.</p>
      </div>
      <div class="atlas-button-row">
        <a class="atlas-btn atlas-btn-primary" href="<?php echo esc_url(atlas_resume_url()); ?>">Download Resume</a>
        <a class="atlas-btn atlas-btn-light" href="<?php echo esc_url(atlas_linkedin_url()); ?>" target="_blank" rel="noopener">LinkedIn</a>
      </div>
    </div>

    <div class="atlas-page-content" style="padding-left:0;padding-right:0;">
      <?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
