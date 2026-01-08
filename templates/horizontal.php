<div class="pcs-wrapper pcs-horizontal">
  <?php while ($query->have_posts()) : $query->the_post(); ?>
    <article class="pcs-card pcs-card-horizontal">
      <a href="<?php the_permalink(); ?>">

        <div class="pcs-card-media">
          <?php the_post_thumbnail('medium_large'); ?>
        </div>

        <div class="pcs-card-content">
          <h3><?php the_title(); ?></h3>
        </div>

      </a>
    </article>
  <?php endwhile; ?>
</div>
