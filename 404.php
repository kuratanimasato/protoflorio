<?php
/*
 * Template Name: 404.php
 */
?>
<?php get_header(); ?>
<main class="content">
  <section class="works section">
    <div class="container">
      <img class="error-img" src="<?php echo esc_url(get_theme_file_uri('assets/images/404.jpeg')); ?>" alt="404エラー">
      <h1><span class="error-num">404 </span><br>Page Not Found</h1>
      <p>お探しのページは見つかりませんでした。</p>
      <a href="<?php echo esc_url(home_url('/')); ?>">トップページに戻る</a>
    </div>
  </section>
</main>
<?php get_footer(); ?>