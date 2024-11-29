<?php
// WP_Query の設定
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
  'post_type' => 'works',       // カスタム投稿タイプ名
  'posts_per_page' => 8,        // 表示する投稿数
  'orderby' => 'date',          // 並び順
  'order' => 'DESC',            // 降順
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
<?php else: ?>
  <p>現在表示できる作品がありません。</p>
<?php endif; ?>
<?php wp_reset_postdata(); ?>