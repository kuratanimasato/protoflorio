<?php
/*
 * Template Name: index.php
 */
?>
<?php get_header(); ?>
<main class="content">
  <!-- mv -->
  <div class="mv">
    <div class="fluid"></div>
    <div class="scrollarrow__down"><span>Scroll</span></div>
    <div class="mv-container">
      <p class="mv-title">Masato Kuratani</p>
      <p class="mv-subtitle">PORTFOLIO</p>
      <p class="mv-text">
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
        <?php if (have_posts()): ?>
          <?php while (have_posts()):
            the_post(); ?>
            <h1><?php echo get_the_title(); ?></h1>
            <div><?php the_content(); ?></div>
          <?php endwhile; ?>
        <?php endif; ?>
        <p>index.phpを表示しています</p>
        <a class="works-item" href="works-11.html">
          <div class="works-img"><img src="img/yosidakoumuten.png" alt="吉田工務店（架空サイト）" /></div>
          <p class="works-name">吉田工務店（架空サイト）</p>
          <p class="works-info">website</p>
        </a>
        <a class="works-item" href="works-00.html">
          <div class="works-img"><img src="img/works4-thumb.png" alt /></div>
          <p class="works-name">ポートフォリオサイト</p>
          <p class="works-info">website</p>
        </a>
        <a class="works-item" href="works-09.html">
          <div class="works-img"><img src="img/works-09.png" alt /></div>
          <p class="works-name">ホットヨガ教室(架空サイト)</p>
          <p class="works-info">website</p>
        </a>
        <a class="works-item" href="works-01.html">
          <div class="works-img"><img src="img/works-03.jpg" alt /></div>
          <p class="works-name">グランドールシノハラ</p>
          <p class="works-info">website</p>
        </a>
        <a class="works-item" href="works-02.html">
          <div class="works-img"><img src="img/works2-thumb.jpg" alt /></div>
          <p class="works-name">大泉町整体院(架空サイト)</p>
          <p class="works-info">website</p>
        </a>
        <a class="works-item" href="works-03.html">
          <div class="works-img"><img src="img/works3-thumb.png" alt /></div>
          <p class="works-name">自然食レストラン和みや(架空サイト)</p>
          <p class="works-info">website</p>
        </a>
        <a class="works-item" href="works-04.html">
          <div class="works-img"><img src="img/banner2.jpg" alt /></div>
          <p class="works-name">アパート物件紹介バナー</p>
          <p class="works-info">banner</p>
          <p class="works-txt"></p>
        </a>
        <a class="works-item" href="works-05.html">
          <div class="works-img"><img src="img/banner4.jpg" alt /></div>
          <p class="works-name">腰痛整体院バナー</p>
          <p class="works-info">banner</p>
          <p class="works-txt"></p>
        </a>
      </div>
      <div class="btn">
        <a href="works.html" class="btn-link">すべて見る</a>
      </div>
    </div>
  </section>
  <!-- /works -->
</main>
<?php get_footer(); ?>