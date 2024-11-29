<?php
/*
 * Template Name: page-about.php
 */
?>
<?php get_header(); ?>
<main class="content">
  <!-- about -->
  <section class="about section" id="about">
    <div class="container">
      <?php get_template_part('templates/breadcrumb'); ?>
      <h2 class="title"><?php echo get_the_title(); ?></h2>
      <div class="profile">
        <div class="profile-body">
          <?php while (have_posts()):
            the_post();
            the_content();
          endwhile; ?>
        </div>
      </div>
    </div>
  </section>
  <!-- /about -->
</main>
<?php get_footer(); ?>