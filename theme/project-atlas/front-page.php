<?php get_header(); ?>

<section class="atlas-hero">
  <div class="atlas-hero-inner">
    <div class="atlas-eyebrow">Enterprise Technology Architect</div>
    <div class="atlas-status-row">
      <span class="atlas-pill"><span class="atlas-dot"></span>Open to the right opportunity</span>
      <span class="atlas-pill">Hybrid / Remote</span>
      <span class="atlas-pill">Wisconsin / Midwest</span>
    </div>
    <h1>I build technology that businesses depend on.</h1>
    <p>
      For more than a decade, I've designed enterprise infrastructure, developed software, integrated business systems,
      and solved complex technical challenges across networking, cybersecurity, databases, e-commerce, and automation.
    </p>
    <div class="atlas-button-row">
      <a class="atlas-btn atlas-btn-primary" href="<?php echo esc_url(home_url('/resume/')); ?>">View Resume</a>
      <a class="atlas-btn atlas-btn-secondary" href="<?php echo esc_url(atlas_linkedin_url()); ?>" target="_blank" rel="noopener">LinkedIn</a>
      <a class="atlas-btn atlas-btn-secondary" href="<?php echo esc_url(atlas_github_url()); ?>" target="_blank" rel="noopener">GitHub</a>
      <a class="atlas-btn atlas-btn-secondary" href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a>
    </div>
  </div>
</section>

<section class="atlas-section">
  <div class="atlas-container">
    <h2>What I do</h2>
    <p class="atlas-lead">
      I work across infrastructure, software development, and business systems integration to create reliable solutions
      that support real operations.
    </p>

    <div class="atlas-grid atlas-grid-3" style="margin-top:30px;">
      <div class="atlas-card">
        <h3>Infrastructure Architecture</h3>
        <p>Enterprise networking, Microsoft infrastructure, virtualization, disaster recovery, server architecture, and operational reliability.</p>
      </div>
      <div class="atlas-card">
        <h3>Software Development</h3>
        <p>C#, .NET, SQL Server, REST APIs, Angular, integrations, automation, and custom applications that solve business problems.</p>
      </div>
      <div class="atlas-card">
        <h3>Systems Integration</h3>
        <p>E-commerce, payment processing, shipping systems, internal tools, reporting, and workflow automation.</p>
      </div>
    </div>
  </div>
</section>

<section class="atlas-section atlas-section-dark">
  <div class="atlas-container">
    <h2>Experience Snapshot</h2>
    <p class="atlas-lead">
      12+ years building and supporting technology across infrastructure, development, cybersecurity, and enterprise systems.
    </p>

    <div class="atlas-timeline">
      <div class="atlas-timeline-item">
        <h3>Enterprise Technology Architect</h3>
        <div class="atlas-meta">L'BRI PURE n' NATURAL · April 2014 – Present</div>
        <p>
          Senior technical resource responsible for enterprise infrastructure, networking, cybersecurity, software development,
          e-commerce integrations, and technology strategy.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="atlas-section">
  <div class="atlas-container">
    <h2>Featured Project Areas</h2>
    <p class="atlas-lead">Generalized project areas that show the kind of problems I solve without exposing proprietary information.</p>

    <div class="atlas-grid atlas-grid-2" style="margin-top:30px;">
      <?php
      $projects = new WP_Query(array(
          'post_type' => 'atlas_project',
          'posts_per_page' => 4,
          'post_status' => 'publish',
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
        <div class="atlas-card"><h3>Enterprise Infrastructure Modernization</h3><p>Network, server, virtualization, security, and resiliency improvements.</p></div>
        <div class="atlas-card"><h3>Custom .NET API Development</h3><p>Business APIs and services built around real operational workflows.</p></div>
        <div class="atlas-card"><h3>E-Commerce Systems Integration</h3><p>Integrations across e-commerce, payment, shipping, and internal systems.</p></div>
        <div class="atlas-card"><h3>Security & Monitoring Improvements</h3><p>Logging, monitoring, hardening, visibility, and operational security improvements.</p></div>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="atlas-section atlas-section-dark">
  <div class="atlas-container">
    <h2>Core Technical Skills</h2>
    <div class="atlas-tech-list">
      <span class="atlas-skill">C#</span><span class="atlas-skill">.NET</span><span class="atlas-skill">SQL Server</span>
      <span class="atlas-skill">REST APIs</span><span class="atlas-skill">Angular</span><span class="atlas-skill">Windows Server</span>
      <span class="atlas-skill">Active Directory</span><span class="atlas-skill">Cisco Networking</span><span class="atlas-skill">VMware</span>
      <span class="atlas-skill">XenServer</span><span class="atlas-skill">Cybersecurity</span><span class="atlas-skill">Shopify</span>
      <span class="atlas-skill">Systems Integration</span><span class="atlas-skill">Automation</span>
    </div>
  </div>
</section>

<section class="atlas-section">
  <div class="atlas-container">
    <div class="atlas-resume-box">
      <div>
        <h2 style="margin-bottom:8px;">Resume</h2>
        <p class="atlas-lead" style="margin:0;">Download a copy of my resume or connect with me on LinkedIn.</p>
      </div>
      <div class="atlas-button-row">
        <a class="atlas-btn atlas-btn-primary" href="<?php echo esc_url(atlas_resume_url()); ?>">Download Resume</a>
        <a class="atlas-btn atlas-btn-light" href="<?php echo esc_url(atlas_linkedin_url()); ?>" target="_blank" rel="noopener">LinkedIn</a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
