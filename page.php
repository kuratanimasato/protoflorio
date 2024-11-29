<?php
/*
 * Template Name: page.php
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
  <p>page.phpを表示しています</p>
</main>
<?php get_footer(); ?>