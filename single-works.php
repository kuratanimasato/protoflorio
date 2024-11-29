<?php
/*
 * Template Name: single-works.php
 */
?>
<?php get_header(); ?>
<main>

  <main class="content">
    <article class="article">
      <div class="article-container">
        <?php get_template_part('templates/breadcrumb'); ?>
        <h2 class="article-title"><?php echo get_the_title(); ?></h2>
        <div class="article-body">
          <?php if (have_posts()): ?>
            <?php while (have_posts()):
              the_post(); ?>
              <div><?php the_content(); ?></div>
            <?php endwhile; ?>
          <?php endif; ?>
          <div class="back-link">
            <a href=<?php echo esc_url(get_post_type_archive_link('works')); ?>>Works一覧へ戻る</a>
          </div>
        </div>
    </article>
  </main>
  <?php get_footer(); ?>