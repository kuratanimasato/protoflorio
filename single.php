<?php
/*
 * Template Name: single.php
 */
?>
<?php get_header(); ?>
<main>
  <?php if (have_posts()): ?>
    <?php while (have_posts()):
      the_post(); ?>
      <h1><?php echo get_the_title(); ?></h1>
      <div><?php the_content(); ?></div>
    <?php endwhile; ?>
  <?php endif; ?>
  <p>single.phpを表示しています</p>
  <?php comments_template(); ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>