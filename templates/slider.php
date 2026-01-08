<div class="pcs-slider swiper">
  <div class="swiper-wrapper">

    <?php while ($query->have_posts()) : $query->the_post(); ?>
      <div class="swiper-slide">
        <article class="pcs-card pcs-card--slider">

          <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('large'); ?>
            <?php endif; ?>

            <div class="pcs-card-content">
              <h3><?php echo pcs_truncate_title(get_the_title(), $atts); ?></h3>

              <?php if ($atts['show_excerpt']) : ?>
                <p class="pcs-excerpt"><?php echo get_the_excerpt(); ?></p>
              <?php endif; ?>

              <?php if ($atts['show_meta']) : ?>
                <span class="pcs-meta">
                  <?php echo get_the_date(); ?> · <?php the_author(); ?>
                </span>
              <?php endif; ?>
            </div>

          </a>

        </article>
      </div>
    <?php endwhile; ?>

  </div>

  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</div>
