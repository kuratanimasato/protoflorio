<div class="works-list">
  <?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $args = array(
    'post_type' => 'works',
    'posts_per_page' => 16,
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged,
  );
  $works_query = new WP_Query($args);
  if ($works_query->have_posts()):
    while ($works_query->have_posts()):
      $works_query->the_post();
      ?>
      <div class="work-item">
        <?php if (has_post_thumbnail()): ?>
          <a href="<?php echo esc_url(get_permalink()); ?>">
            <p class="work-img"><?php the_post_thumbnail('medium'); ?></p>
          </a>
          <p class="works-name"><?php the_title() ?></p>
        <?php endif; ?>

        <p class="works-info">
          <?php
          $tags = wp_get_post_terms(get_the_ID(), 'tag_works');
          if ($tags && !is_wp_error($tags)) {
            foreach ($tags as $tag) {
              echo '<a href="' . esc_url(get_term_link($tag)) . '">' . esc_html($tag->name) . '</a> ';
            }
          } else {
            echo 'タグが存在しません。';
          }
          ?>
        </p>
      </div>
      <?php
    endwhile;
    ?>
  </div>
  <div class="pagination-container">
    <?php
    if (function_exists('wp_pagenavi')) {
      wp_pagenavi(array('query' => $works_query));
    }
    ?>
  </div>
  <?php
  wp_reset_postdata();
  else:
    echo '記事がありません。';
  endif;
  ?>
</div>