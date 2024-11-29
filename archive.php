<?php
/*
 * Template Name: archive.php
 */
?>
<?php get_header(); ?>
<main>
  <?php if (have_posts()): ?>
    <?php while (have_posts()):
      the_post(); ?>
      <article>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
      </article>
    <?php endwhile; ?>
  <?php endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>