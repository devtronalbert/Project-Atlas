<?php
if (!defined('ABSPATH')) { exit; }

function atlas_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'project-atlas'),
    ));
}
add_action('after_setup_theme', 'atlas_setup');

function atlas_assets() {
    wp_enqueue_style('project-atlas-style', get_stylesheet_uri(), array(), '1.0.2');
    wp_enqueue_script('project-atlas-main', get_template_directory_uri() . '/assets/main.js', array(), '1.0.2', true);
}
add_action('wp_enqueue_scripts', 'atlas_assets');

function atlas_register_project_post_type() {
    $labels = array(
        'name' => 'Projects',
        'singular_name' => 'Project',
        'add_new_item' => 'Add New Project',
        'edit_item' => 'Edit Project',
        'new_item' => 'New Project',
        'view_item' => 'View Project',
        'search_items' => 'Search Projects',
        'not_found' => 'No projects found',
        'menu_name' => 'Projects',
    );

    register_post_type('atlas_project', array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
        'has_archive' => false,
        'rewrite' => array('slug' => 'project'),
    ));
}
add_action('init', 'atlas_register_project_post_type');

function atlas_fallback_menu() {
    $links = array(
        'Home' => home_url('/'),
        'About' => home_url('/about/'),
        'Experience' => home_url('/experience/'),
        'Projects' => home_url('/projects/'),
        'Skills' => home_url('/skills/'),
        'Resume' => home_url('/resume/'),
        'Contact' => home_url('/contact/'),
    );

    echo '<nav class="atlas-menu" id="atlas-menu" aria-label="Primary navigation">';
    foreach ($links as $label => $url) {
        echo '<a href="' . esc_url($url) . '">' . esc_html($label) . '</a>';
    }
    echo '</nav>';
}

function atlas_primary_menu() {
    if (has_nav_menu('primary')) {
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'atlas-menu',
            'container_id' => 'atlas-menu',
            'menu_class' => '',
            'fallback_cb' => 'atlas_fallback_menu',
            'depth' => 1,
        ));
    } else {
        atlas_fallback_menu();
    }
}

function atlas_linkedin_url() {
    return 'https://www.linkedin.com/in/devon-albert-7434299b';
}

function atlas_github_url() {
    return 'https://github.com/devtronalbert';
}

function atlas_email() {
    return 'devon.albert2013@gmail.com';
}

function atlas_resume_url() {
    return home_url('/resume.pdf');
}

function atlas_page_description($fallback = '') {
    if (has_excerpt()) {
        return get_the_excerpt();
    }
    return $fallback;
}
?>
