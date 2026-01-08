<div class="pcs-wrapper pcs-list">
  <?php while ($query->have_posts()) : $query->the_post(); ?>
    <article class="pcs-card pcs-card-list">
      <a href="<?php the_permalink(); ?>">

        <div class="pcs-card-media">
          <?php the_post_thumbnail('medium'); ?>
        </div>

        <div class="pcs-card-content">
          <h3 class="pcs-card-title">
            <?php echo pcs_truncate_title(get_the_title(), $atts); ?>
          </h3>
        </div>

      </a>
    </article>
  <?php endwhile; ?>
</div>
