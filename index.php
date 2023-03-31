<?php get_header() ?>
<div class="container mt-5 mb-5">
    

<?php
    $page_title = get_page_title();
    echo $page_title;
?>

<?php if (have_posts()): ?>
    <div class="row">
        <?php while (have_posts()):the_post(); ?>
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                    <?php the_post_thumbnail('small',['class'=>'card-img-top','alt'=>'hello','style'=>'height:auto;']) ?>
                    <img class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title() ?></h5>
                        <p class="card-text"><?php the_excerpt() ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn">Voir plus</a>
                    </div>
                </div>
            </div>
        
        <?php endwhile ?>
    </div>

    <?php else: ?>
    <h2>Rien n'a afficher</h2>
<?php endif ?>
<?php get_footer() ?>