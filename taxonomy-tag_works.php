<?php get_header(); ?>

<main class="content">
  <section class="tags section" id="tags">
    <div class="container">
      <?php get_template_part('templates/breadcrumb'); ?>
      <?php
      // 現在のタクソノミー情報を取得
      $term = get_queried_object();
      ?>
      <h1 class="page-title"><?php echo esc_html($term->name); ?> の作品一覧</h1>
      <p class="term-description"><?php echo esc_html($term->description); ?></p>

      <div class="tags-list">
        <?php
        $args = array(
          'post_type' => 'works',
          'tax_query' => array(
            array(
              'taxonomy' => 'tag_works',
              'field' => 'slug',
              'terms' => $term->slug,
            ),
          ),
          'posts_per_page' => -1,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()):
          while ($query->have_posts()):
            $query->the_post();
            ?>
            <div class="tags-item">
              <?php if (has_post_thumbnail()): ?>
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('medium'); ?>
                </a>
              <?php endif; ?>
              <h2 class="tags-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
            </div>
            <?php
          endwhile;
        else:
          echo '<p>該当する作品がありません。</p>';
        endif;
        wp_reset_postdata();
        ?>
      </div>
      <div class="back-link">
        <a href=<?php echo esc_url(get_post_type_archive_link('works')); ?>>Works一覧へ戻る</a>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>