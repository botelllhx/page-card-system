<div class="pcs-wrapper pcs-slider swiper">
    <div class="swiper-wrapper">

        <?php while ($query->have_posts()):
            $query->the_post(); ?>
            <div class="swiper-slide">
                <article class="pcs-card">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium_large'); ?>
                        <h3><?php the_title(); ?></h3>
                    </a>
                </article>
            </div>
        <?php endwhile; ?>

    </div>

    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>