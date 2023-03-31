<?php
/*
    Template Name:One Category
    Template Post Type: page
*/
?>
<?php get_header(); ?>

<div class="container">

  <div class="row mt-2">
  <h2 class="mt-3 mb-2">Sport</h2>
    <?php 
    $sport_category = get_category_by_slug('sport'); // on récupère la catégorie "Sport"
    $sport_subcategories = get_categories(array(
        'orderby' => 'name',
        'parent' => $sport_category->term_id // on récupère les sous-catégories de la catégorie "Sport"
    ));
    ?>


    
    <?php if (!empty($sport_subcategories)) : //On réucpere que les sous categories de Sports ?>
    

      <?php foreach ($sport_subcategories as $subcategory) : ?>
        <div class="col-sm-12 mt-3">
        <hr>
          <h3><?php echo $subcategory->name; ?></h3>
          <?php
          $query = new WP_Query(array(
            'post_type' => 'post',
            'category__in' => array($subcategory->term_id),
            'posts_per_page' => -1
          ));
          ?>

          <?php if ($query->have_posts()) : ?>

            <!--carte bootsrap-->
            <div class="row"> 
              <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-sm-4 mt-3">
                  <div class="card" style="width: 18rem;">
                    <?php the_post_thumbnail('small', array('class' => 'card-img-top', 'alt' => 'hello', 'style' => 'height:auto;')) ?>
                    <img class="card-img-top">
                    <div class="card-body">
                      <h5 class="card-title"><?php the_title() ?></h5>
                      <p class="card-text"><?php the_excerpt() ?></p>
                      <a href="<?php the_permalink(); ?>" class="btn">Voir plus</a>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>

          <?php else : ?>
            <h4>Aucun article dans cette sous-catégorie</h4>
          <?php endif; ?>

          <?php wp_reset_postdata(); ?>

        </div>
      <?php endforeach; ?>

    <?php else : ?>
      <h2>Aucune sous-catégorie trouvée pour la catégorie "Sport"</h2>
    <?php endif; ?>

  </div>
</div>