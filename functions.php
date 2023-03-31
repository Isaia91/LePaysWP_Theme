<?php 

    



    function mon_theme_supports (){
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        add_theme_support( 'tribe-events-views' ); //pour le plugin TheEventsCalendar
        register_nav_menu('header','En tête du menu');
        register_nav_menu('footer','Pied de page');
    }

    /*css boostrap*/ 
    function montheme_register_assets (){
        wp_register_style('bootsrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css');
        wp_register_style( 'style', get_template_directory_uri( ).'/style.css',array(), false,'all');
        wp_register_script('boostrap','https://code.jquery.com/jquery-3.2.1.slim.min.js',['popper','jqueryboostrap'],false,true);
        wp_register_script('popper','https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js',[],false,true);
        wp_register_script('jqueryboostrap','https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js',[],false,true);
        
        /*On lance le register , qui permet d'activer le css */
        wp_enqueue_style( 'bootsrap' );
        wp_enqueue_script('bootsrap');
        wp_enqueue_style( 'style' );
    }

    function montheme_title_separator($title){
        return ' | ';

    }

    function montheme_menu_class($classes) {
        $classes[] = 'nav_item , ml-5';
        return $classes;
    }

    function montheme_menu_link_class($attrs) {
        $attrs['class'] = 'nav-link';
        return $attrs;
    }

    function get_page_title() {
        global $post;
        $title = '';
    
        if (is_home()) { // Si c'est la page d'accueil
            $title = get_bloginfo('name');
        } elseif (is_archive()) { // Si c'est une archive
            $title = get_the_archive_title();
        } elseif (is_search()) { // Si c'est une recherche
            $title = sprintf( __( 'Search Results for: %s', 'textdomain' ), get_search_query() );
        } elseif (is_404()) { // Si c'est une erreur 404
            $title = __('Error 404: Page not found', 'textdomain');
        } elseif ($post->post_type === 'post') { // Si c'est une publication
            $title = get_the_title();
        } elseif ($post->post_type === 'page') { // Si c'est une page
            $title = get_the_title();
        }
    
        return $title;
    }

    add_action( 'wp_enqueue_scripts', 'montheme_register_assets' );
    add_action('after_setup_theme','mon_theme_supports');
    add_filter('document_title_separator','montheme_title_separator');
    add_filter('nav_menu_css_class','montheme_menu_class');
    add_filter('nav_menu_link_attributes','montheme_menu_link_class');

    // Ajouter le support pour les shortcodes dans les widgets
    add_filter('widget_text', 'do_shortcode');

    // Ajouter le support pour les shortcodes dans les pages
    add_filter('the_content', 'do_shortcode');
    add_filter('get_the_content', 'do_shortcode');
    add_filter('the_excerpt', 'do_shortcode');
