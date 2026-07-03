<?php if (!defined('ABSPATH')) { exit; } ?>
<footer class="atlas-footer">
  <div class="atlas-footer-inner">
    <div>
      <strong>Devon Albert</strong>
      <div class="atlas-version">Project Atlas · v1.0.0 · Built with WordPress, PHP, and practical engineering.</div>
    </div>
    <div>
      <a href="mailto:<?php echo esc_attr(atlas_email()); ?>">Email</a> ·
      <a href="<?php echo esc_url(atlas_linkedin_url()); ?>" target="_blank" rel="noopener">LinkedIn</a> ·
      <a href="<?php echo esc_url(atlas_github_url()); ?>" target="_blank" rel="noopener">GitHub</a>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
