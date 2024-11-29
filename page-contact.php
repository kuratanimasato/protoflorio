<?php
/*
 * Template Name: page-contact.php
 */
?>
<?php get_header(); ?>

<main class="content">
  <section class="contact section">
    <div class="container">
      <?php get_template_part('templates/breadcrumb'); ?>
      <h2 class="title"><?php echo get_the_title(); ?></h2>
      <p class="contact-lead">お問合わせはこちらからお願いいたします。</p>
      <div class="contact-block">
        <?php while (have_posts()):
          the_post();
          the_content();
        endwhile; ?>
      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>