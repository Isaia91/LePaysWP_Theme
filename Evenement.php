<?php
/*
Template Name: Page personnalisée pour les événements
*/

get_header(); ?>

<div class="container">


    <div class="row">

        <a class="mt-5 mb-3" href="<?php echo esc_url( get_post_type_archive_link( 'tribe_events' ) ); ?>">Voir tous les événements</a>

        <div class="col-md-12">

            <?php tribe_get_template_part( 'archive' );  //propore au plugin TheEvents Calendar il faut le charger dans functions.php?>

        </div>

        <div class="col-md-4">

            <h2>Evénements à venir</h2>

            <?php
            // On affiche une liste de tous les événements
            $events = tribe_get_events( array(
                'eventDisplay' => 'all',
                'posts_per_page' => -1,
            ) );

            if ( $events ) :
                echo '<ul>';
                foreach ( $events as $event ) :
                    echo '<li><a href="' . esc_url( get_permalink( $event->ID ) ) . '">' . esc_html( get_the_title( $event->ID ) ) . '</a></li>';
                endforeach;
                echo '</ul>';
            endif;
            ?>

        </div>
    </div>

</div>

<?php get_footer(); ?>
