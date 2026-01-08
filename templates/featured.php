<div class="pcs-wrapper pcs-featured">
  <?php while ($query->have_posts()) : $query->the_post(); ?>
    <article class="pcs-card pcs-card-featured">
      <a href="<?php the_permalink(); ?>">

        <div class="pcs-card-media">
          <?php the_post_thumbnail('large'); ?>
        </div>

        <div class="pcs-card-overlay">
          <h3><?php echo pcs_truncate_title(get_the_title(), $atts); ?></h3>
        </div>

      </a>
    </article>
  <?php endwhile; ?>
</div>
