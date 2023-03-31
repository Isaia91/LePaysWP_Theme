<?php
/*
Template Name:Display Posts by Category
Template Post Type: page
*/
?>

<?php get_header(); ?>

<div class="container">
  <div class="row mt-2">

    <?php 
    $categories = get_categories(array(
        'orderby' => 'name',
        'parent' => 0
    )); //on recupere mes catégories parents uniquement
    ?>

    <?php if (!empty($categories)) : ?>

      <?php foreach ($categories as $category) : ?>
        <div class="col-sm-12 mt-3">
        <hr>
          <h3><?php echo $category->name; ?></h3>
          <?php
          $query = new WP_Query(array(
            'post_type' => 'post',
            'category__in' => array($category->term_id),
            'posts_per_page' => -1
          ));
          ?>

          <?php if ($query->have_posts()) : ?>

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
            <h4>Aucun article dans cette catégorie</h4>
          <?php endif; ?>

          <?php wp_reset_postdata(); ?>

        </div>
      <?php endforeach; ?>

    <?php else : ?>
      <h2>Aucune catégorie parente trouvée</h2>
    <?php endif; ?>

  </div>
</div>


