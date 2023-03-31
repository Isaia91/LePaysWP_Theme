<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
   
</head>

<body>
    
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <img src="<?php echo get_template_directory_uri(); ?>./assets/images/logo-removebg-preview (1).png" class="rounded mx-auto d-block logo"  alt="Logo">
            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-light navcolor sticky-top">
        

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php wp_nav_menu(array(
                'theme_location' => 'header',
                'container' => false,
                'menu_class' => 'navbar-nav mr-auto',
                'items' => array(
                    '<li class="nav-item"><a class="nav-link" href="URL DE LA PAGE EVENTS">Events</a></li>',
                )));
             ?>
            <?=  get_search_form() ?>
        </div>

    </nav>
  