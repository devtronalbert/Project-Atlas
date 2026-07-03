<?php
/*
Plugin Name: Project Atlas Installer
Description: One-time installer for Project Atlas pages, menu, and starter projects.
Version: 1.0.0
Author: Devon Albert
*/

if (!defined('ABSPATH')) { exit; }

function atlas_installer_register_project_post_type() {
    if (post_type_exists('atlas_project')) {
        return;
    }

    register_post_type('atlas_project', array(
        'labels' => array(
            'name' => 'Projects',
            'singular_name' => 'Project',
            'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project',
            'menu_name' => 'Projects',
        ),
        'public' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
        'rewrite' => array('slug' => 'project'),
    ));
}
add_action('init', 'atlas_installer_register_project_post_type');

function atlas_installer_admin_menu() {
    add_management_page(
        'Project Atlas Installer',
        'Project Atlas Installer',
        'manage_options',
        'project-atlas-installer',
        'atlas_installer_page'
    );
}
add_action('admin_menu', 'atlas_installer_admin_menu');

function atlas_create_page($title, $slug, $content, $template = '') {
    $existing = get_page_by_path($slug);

    $page_data = array(
        'post_title'   => $title,
        'post_name'    => $slug,
        'post_content' => $content,
        'post_status'  => 'publish',
        'post_type'    => 'page'
    );

    if ($existing) {
        $page_data['ID'] = $existing->ID;
        $page_id = wp_update_post($page_data);
    } else {
        $page_id = wp_insert_post($page_data);
    }

    if ($page_id && !is_wp_error($page_id) && $template) {
        update_post_meta($page_id, '_wp_page_template', $template);
    }

    return $page_id;
}

function atlas_create_project($title, $slug, $excerpt, $content) {
    $existing = get_page_by_path($slug, OBJECT, 'atlas_project');

    $post_data = array(
        'post_title'   => $title,
        'post_name'    => $slug,
        'post_excerpt' => $excerpt,
        'post_content' => $content,
        'post_status'  => 'publish',
        'post_type'    => 'atlas_project'
    );

    if ($existing) {
        $post_data['ID'] = $existing->ID;
        return wp_update_post($post_data);
    }

    return wp_insert_post($post_data);
}

function atlas_install_content() {
    $home = '<!-- wp:paragraph --><p>Project Atlas home page. The active theme controls the homepage layout.</p><!-- /wp:paragraph -->';

    $about = <<<HTML
<!-- wp:paragraph -->
<p>I am a hands-on technology professional with 12+ years of experience spanning enterprise infrastructure, software development, cybersecurity, networking, virtualization, systems integration, databases, and e-commerce platforms.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>My work focuses on translating business requirements into secure, reliable, and maintainable technical solutions. I enjoy working across the full technology stack, from designing network and server infrastructure to developing APIs, integrating business systems, automating processes, and troubleshooting complex technical issues.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>This combination of infrastructure and software development experience allows me to bridge the gap between engineering, operations, and business objectives.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Core Areas of Expertise</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul>
<li>Infrastructure Architecture</li>
<li>Enterprise Networking and Security</li>
<li>Microsoft Technologies and Active Directory</li>
<li>Virtualization and Disaster Recovery</li>
<li>C# / .NET Development</li>
<li>SQL Server and Data Integration</li>
<li>REST APIs and Systems Integration</li>
<li>Shopify and E-Commerce Platforms</li>
<li>Business Process Automation</li>
<li>Enterprise Systems Design</li>
</ul>
<!-- /wp:list -->
HTML;

    $experience = <<<HTML
<!-- wp:heading -->
<h2>Enterprise Technology Architect</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><strong>L'BRI PURE n' NATURAL</strong> · April 2014 – Present</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Senior technical resource responsible for infrastructure, networking, cybersecurity, software development, enterprise systems, e-commerce integrations, and technology strategy.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3>Infrastructure and Enterprise Systems</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul>
<li>Architect and maintain enterprise infrastructure supporting business-critical operations.</li>
<li>Design and support Cisco networking environments including switching, routing, VLANs, VPNs, wireless technologies, and security controls.</li>
<li>Administer Microsoft technologies including Active Directory, Group Policy, DNS, DHCP, DFS, replication, Microsoft 365, and Windows Server.</li>
<li>Manage virtualization environments utilizing VMware and XenServer platforms.</li>
<li>Support disaster recovery, backup, resiliency, and infrastructure modernization initiatives.</li>
</ul>
<!-- /wp:list -->

<!-- wp:heading {"level":3} -->
<h3>Software Development and Systems Integration</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul>
<li>Develop and maintain custom business applications using C#, .NET Framework, .NET 8, SQL Server, Entity Framework, Angular, JavaScript, and REST APIs.</li>
<li>Design and implement integrations involving Shopify, payment processors, shipping providers, fulfillment systems, and internal business applications.</li>
<li>Develop automation solutions that improve operational efficiency and reduce manual processes.</li>
<li>Build APIs and internal services supporting e-commerce, fulfillment, reporting, and business operations.</li>
</ul>
<!-- /wp:list -->

<!-- wp:heading {"level":3} -->
<h3>Security and Operations</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul>
<li>Implement cybersecurity controls, monitoring solutions, and infrastructure hardening initiatives.</li>
<li>Provide senior-level technical leadership while remaining deeply involved in hands-on engineering and problem solving.</li>
<li>Manage technology vendors, licensing, platforms, and strategic technology initiatives.</li>
</ul>
<!-- /wp:list -->
HTML;

    $projects = '<!-- wp:paragraph --><p>This page is powered by the Projects post type. Add or edit project cards from the WordPress admin under Projects.</p><!-- /wp:paragraph -->';

    $skills = <<<HTML
<!-- wp:heading -->
<h2>Infrastructure and Systems</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Windows Server, Active Directory, Group Policy, DNS, DHCP, DFS, Microsoft 365, VMware, XenServer, Citrix, backup and recovery, disaster recovery, high availability.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Networking and Security</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Cisco switching, Cisco routing, VLANs, VPNs, Cisco ASA, firewall administration, network security, OSPF, EIGRP, monitoring, cybersecurity, access control, and infrastructure hardening.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Software Development</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>C#, .NET Framework, .NET 8, ASP.NET Web API, Entity Framework, SQL Server, T-SQL, Angular, JavaScript, JSON, REST APIs, systems integration, and business process automation.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Business Platforms</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Shopify, e-commerce systems, payment integrations, shipping integrations, VoIP / Asterisk PBX, reporting systems, and enterprise business applications.</p>
<!-- /wp:paragraph -->
HTML;

    $resume = <<<HTML
<!-- wp:paragraph -->
<p>Download my resume or connect with me on LinkedIn.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><em>Upload your resume PDF as <strong>/resume.pdf</strong> or update the resume URL in the theme.</em></p>
<!-- /wp:paragraph -->
HTML;

    $contact = <<<HTML
<!-- wp:paragraph -->
<p>I am open to conversations around enterprise architecture, infrastructure engineering, systems integration, software development, and technical leadership.</p>
<!-- /wp:paragraph -->
HTML;

    $home_id = atlas_create_page('Home', 'home', $home);
    $about_id = atlas_create_page('About', 'about', $about);
    $experience_id = atlas_create_page('Experience', 'experience', $experience);
    $projects_id = atlas_create_page('Projects', 'projects', $projects, 'page-projects.php');
    $skills_id = atlas_create_page('Skills', 'skills', $skills);
    $resume_id = atlas_create_page('Resume', 'resume', $resume, 'page-resume.php');
    $contact_id = atlas_create_page('Contact', 'contact', $contact, 'page-contact.php');

    if ($home_id && !is_wp_error($home_id)) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $home_id);
    }

    $project_one = <<<HTML
<!-- wp:heading -->
<h2>The Challenge</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Modern business operations depend on reliable infrastructure, secure access, fast networking, and resilient systems. This project area represents work around improving performance, reliability, maintainability, and operational visibility across the enterprise environment.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>My Role</h2>
<!-- /wp:heading -->
<!-- wp:list -->
<ul>
<li>Designed and supported infrastructure architecture across servers, networking, virtualization, and Microsoft technologies.</li>
<li>Improved network segmentation, reliability, and operational maintainability.</li>
<li>Supported backup, recovery, availability, and long-term infrastructure planning.</li>
</ul>
<!-- /wp:list -->

<!-- wp:heading -->
<h2>Technology Stack</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Cisco networking, Windows Server, Active Directory, VMware, XenServer, VLANs, VPNs, DNS, DHCP, Microsoft 365.</p>
<!-- /wp:paragraph -->
HTML;

    $project_two = <<<HTML
<!-- wp:heading -->
<h2>The Challenge</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Business teams needed reliable internal applications and integrations that reduced manual work, improved data flow, and supported critical operations.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>My Role</h2>
<!-- /wp:heading -->
<!-- wp:list -->
<ul>
<li>Designed and developed APIs and internal applications using C#, .NET, SQL Server, Entity Framework, and REST architecture.</li>
<li>Integrated systems across fulfillment, customer operations, reporting, e-commerce, and business workflows.</li>
<li>Improved maintainability by building services around repeatable business processes.</li>
</ul>
<!-- /wp:list -->

<!-- wp:heading -->
<h2>Technology Stack</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>C#, .NET Framework, .NET 8, ASP.NET Web API, Entity Framework, SQL Server, T-SQL, Angular, JavaScript, REST APIs.</p>
<!-- /wp:paragraph -->
HTML;

    $project_three = <<<HTML
<!-- wp:heading -->
<h2>The Challenge</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>E-commerce operations require reliable integrations between storefronts, payment processors, shipping providers, fulfillment systems, and internal business applications.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>My Role</h2>
<!-- /wp:heading -->
<!-- wp:list -->
<ul>
<li>Architected integrations connecting e-commerce platforms to internal systems and third-party providers.</li>
<li>Supported payment, shipping, fulfillment, customer, and operational workflows.</li>
<li>Designed solutions with a focus on reliability, accuracy, maintainability, and business continuity.</li>
</ul>
<!-- /wp:list -->

<!-- wp:heading -->
<h2>Technology Stack</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Shopify, payment processing integrations, shipping integrations, REST APIs, C#, .NET, SQL Server, JSON, webhooks.</p>
<!-- /wp:paragraph -->
HTML;

    $project_four = <<<HTML
<!-- wp:heading -->
<h2>The Challenge</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Enterprise environments need visibility into systems, security events, infrastructure health, and operational issues before they become business-impacting problems.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>My Role</h2>
<!-- /wp:heading -->
<!-- wp:list -->
<ul>
<li>Implemented monitoring, logging, access controls, and infrastructure hardening initiatives.</li>
<li>Improved security visibility and operational response through better tooling and process improvements.</li>
<li>Supported risk reduction, system reliability, and security-focused operations.</li>
</ul>
<!-- /wp:list -->

<!-- wp:heading -->
<h2>Technology Stack</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Security monitoring, logging, firewalls, access controls, Windows Server, network security, infrastructure hardening, incident response workflows.</p>
<!-- /wp:paragraph -->
HTML;

    atlas_create_project('Enterprise Infrastructure Modernization', 'enterprise-infrastructure-modernization', 'Network, server, virtualization, Microsoft infrastructure, resiliency, and operational reliability improvements.', $project_one);
    atlas_create_project('Custom .NET API Development', 'custom-dotnet-api-development', 'Business APIs and internal services built around real operational workflows.', $project_two);
    atlas_create_project('E-Commerce & Systems Integration', 'e-commerce-systems-integration', 'Integrations across e-commerce, payment, shipping, fulfillment, and internal business systems.', $project_three);
    atlas_create_project('Security & Monitoring Improvements', 'security-monitoring-improvements', 'Security visibility, logging, monitoring, access control, and infrastructure hardening improvements.', $project_four);

    $menu_name = 'Project Atlas Navigation';
    $menu = wp_get_nav_menu_object($menu_name);

    if (!$menu) {
        $menu_id = wp_create_nav_menu($menu_name);
    } else {
        $menu_id = $menu->term_id;
    }

    $page_ids = array(
        $home_id,
        $about_id,
        $experience_id,
        $projects_id,
        $skills_id,
        $resume_id,
        $contact_id
    );

    if ($menu_id && !is_wp_error($menu_id)) {
        foreach ($page_ids as $page_id) {
            if (!$page_id || is_wp_error($page_id)) { continue; }

            $existing_items = wp_get_nav_menu_items($menu_id);
            $already_added = false;

            if ($existing_items) {
                foreach ($existing_items as $item) {
                    if ((int) $item->object_id === (int) $page_id) {
                        $already_added = true;
                        break;
                    }
                }
            }

            if (!$already_added) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-object-id' => $page_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type',
                    'menu-item-status' => 'publish'
                ));
            }
        }

        $locations = get_theme_mod('nav_menu_locations');
        if (!is_array($locations)) {
            $locations = array();
        }
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }

    flush_rewrite_rules();
    update_option('project_atlas_installed_at', current_time('mysql'));
}

function atlas_installer_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

    if (isset($_POST['atlas_install']) && check_admin_referer('atlas_install_action')) {
        atlas_install_content();
        echo '<div class="notice notice-success"><p>Project Atlas content installed/updated successfully.</p></div>';
    }

    $installed = get_option('project_atlas_installed_at');

    echo '<div class="wrap">';
    echo '<h1>Project Atlas Installer</h1>';
    echo '<p>This creates or updates the Home, About, Experience, Projects, Skills, Resume, and Contact pages, creates starter project cards, sets the homepage, and builds the navigation menu.</p>';

    if ($installed) {
        echo '<p><strong>Last installed:</strong> ' . esc_html($installed) . '</p>';
    }

    echo '<form method="post">';
    wp_nonce_field('atlas_install_action');
    echo '<p><input type="submit" name="atlas_install" class="button button-primary" value="Install / Update Project Atlas"></p>';
    echo '</form>';

    echo '<hr>';
    echo '<p><strong>Recommended order:</strong> activate the Project Atlas theme first, then run this installer.</p>';
    echo '<p><strong>After running:</strong> review your pages, edit project cards under Projects, upload your resume PDF, then deactivate/delete this plugin.</p>';
    echo '</div>';
}
