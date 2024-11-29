<?php
/*
 * Template Name: front-page.php
 */
?>
<?php get_header(); ?>
<main class="content">
  <!-- mv -->
  <div class="mv">

    <div class="fluid"></div>
    <div class="scrollarrow__down"><span>Scroll</span></div>
    <div class="mv-container">
      <p class="mv-title ">Masato Kuratani</p>
      <p class="mv-subtitle ">PORTFOLIO</p>
      <p class="mv-text ">
        お客様と共に課題を解決する<br class="sp-only">悩みのあるあなたの課題を解決します。<br>
        デザインとコーディングは<br class="sp-only">おまかせください。<br>
      </p>
    </div>
    <div class="fluid-bottom"></div>
  </div>
  <!-- /mv -->
  <!-- works -->
  <section class="works section">
    <div class="container">
      <h2 class="title">WORKS</h2>
      <div class="works-list">
        <?php get_template_part('templates/custom-loop'); ?>
      </div>
      <div class="btn-block">
        <a href="<?php echo get_post_type_archive_link('works'); ?>" class="btn-link">すべて見る</a>
      </div>
    </div>
  </section>
  <!-- /works -->
</main>
<?php get_footer(); ?>