<?php
/*
 * Template Name: page-skill.php
 */
?>
<?php get_header(); ?>
<main class="content">
  <section class="skill section">
    <div class="container">
      <?php get_template_part('templates/breadcrumb'); ?>
      <h2 class="title"><?php echo get_the_title(); ?></h2>
      <div class="skill-list">
        <div class="skill-item">
          <div class="skill-body">
            <?php while (have_posts()):
              the_post();
              the_content();
            endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>