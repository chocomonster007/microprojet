<?php

get_header();
?>
<?php if(has_post_thumbnail()):?>
    <div class="page-header" style="background-image: url(<?php the_post_thumbnail_url()?>);">
<?php else :?>
    <div class="page-header">
<?php endif;?>

<h1><?php the_title()?></h1>
</div>

<main id="content" class="site-main">


<div class="page-content">
    <?php the_content(); ?>

</div>
<div class="job-list d-flex my-5">
    <?php
    $args = array(
        'post_type'=>'offres-emplois',
        'order'=>'ASC',
        'orderby'=>'menu_order'
    );
    $job_query = new WP_Query($args);

    foreach ($job_query->posts as $job) :?>
<?php $description = get_field('description_de_loffre',$job->ID);
        $excerpt = substr($description,0,10).'...';?>

<div class="px-4">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $job->post_title;?></h5>
    <p class="card-text"><?= strip_tags($excerpt) ?></p>
    <a href="<?= get_permalink($job->ID)?>" class="btn btn-primary">Voir l'offre</a>
  </div>
</div>
</div>
    
<?php endforeach;?>
</div>
</main>
<?php
get_footer();
