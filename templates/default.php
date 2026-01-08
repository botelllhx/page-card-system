<div class="pcs-grid">
  <?php while ($query->have_posts()) : $query->the_post(); ?>
    <div class="pcs-card">
      <a href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('large'); ?>
        <?php endif; ?>
        <h3><?php the_title(); ?></h3>
      </a>
    </div>
  <?php endwhile; ?>
</div>
