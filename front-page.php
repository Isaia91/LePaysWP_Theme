<?php get_header() ?>


<div class="container mt-5">
    <!-- Jumbotron -->
    <div class=row>
        <!-- On va récuperer que le dernier article creer et le mettre dans le jumbotron-->
        <div class="col-md-12">
            <h3>Dernier article publié</h3>
            <?php
            $args = array(
                'posts_per_page' => 1,
                'orderby' => 'date',
                'order' => 'DESC',
                'post_type' => 'post',
                'post_status' => 'publish'
            );
            $latest_post = new WP_Query($args);
            if ($latest_post->have_posts()):
                while ($latest_post->have_posts()):
                    $latest_post->the_post();
                    ?>
                    <div class="jumbotron">
                        <h1 class="display-4">
                            <?php the_title(); ?>
                        </h1>
                        <p class="lead">A la une</p>
                        <hr class="my-4">
                        <p>
                            <?php the_excerpt() ?>
                        </p>
                        <p class="lead">
                            <a href="<?php the_permalink(); ?>" class="btn">Voir plus</a>
                        </p>
                    </div>
                <?php endwhile; endif;
            wp_reset_postdata(); ?>

        </div>
    </div>
    <!-- /Jumbotron -->

    <h2>Nos catégories</h2>
<div class="row mb-5">
  <ul>
    <?php
      $categories = get_categories(array(
        'orderby' => 'name',
        'parent' => 0
      ));
      foreach ($categories as $category) {
        echo '<li><a class="category-link" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
      }
    ?>
  </ul>

    </div>


    <!-- Cartes derniers articles  par theme-->
    <h2>Nos dernieres actualités</h2>
    <?php if (have_posts()): ?>
        <?php
            $categories = get_categories(
                array(
                    'orderby' => 'name',
                    'parent' => 0 // Pour ne récupérer uniquement les sous-categories
                )
            );

            $coolor=true;
            foreach ($categories as $category): ?>
                <hr>
                <h2><?php echo $category->name ?></h2>
                <div class="row">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'category__in' => $category->term_id
                    );
                    $query = new WP_Query($args);
                    ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="col-sm-4">
                            <div class="card" style="width: 18rem;">
                                <?php the_post_thumbnail('small', ['class' => 'card-img-top', 'alt' => 'hello', 'style' => 'height:auto;']) ?>
                                <img class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php the_title() ?>
                                    </h5>
                                    <p class="card-text">
                                        <?php the_excerpt() ?>
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="btn">Voir plus</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endforeach; ?>
    <?php endif; ?>
<!-- Cartes derniers articles  par theme-->


</div>

<?php get_footer() ?>