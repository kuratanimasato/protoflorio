<?php
/*
 * Template Name: header.php
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

  <head>
    <meta charset="utf-8">
    <title>
      <?php
      if (is_front_page()) {
        // トップページ
        echo 'Portfolio';
      } elseif (is_post_type_archive('works')) {
        // WORKS アーカイブページ
        echo 'WORKS | Portfolio';
      } elseif (is_tax('tag_works')) {
        // taxonomy-tag_works.php
        echo '作品一覧 | Portfolio';
      } elseif (is_singular('works')) {
        // 個別のWORKS投稿ページ
        echo get_the_title() . ' | Portfolio';
      } else {
        // その他のページ
        echo get_the_title() . ' | Portfolio';
      }
      ?>
    </title>
    <link rel="canonical" href="https://kuratani-portfolio.xyz/" />
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(''); ?>>
    <div class="wrapper">
      <!-- header -->
      <header class="header ">
        <div class="container">
          <?php
          if (is_front_page() || is_home()) {
            echo '<h1 class="header-logo">';
          } else {
            echo '<div class="header-logo">';
          }
          ?>
          <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
          <?php
          // トップページかどうかでタグを閉じる
          if (is_front_page() || is_home()) {
            echo '</h1>';
          } else {
            echo '</div>';
          }
          ?>
          <nav class="gnav">
            <?php
            wp_nav_menu(array(
              'theme_location' => 'header_nav',
              'menu_class' => 'gnav-list',
              'container' => false,
              'depth' => 1,
              'items_wrap' => '<ul class="%2$s">%3$s</ul>',
              'add_li_class' => 'gnav-item',
            ));
            ?>
          </nav>
        </div>
      </header>
      <!-- /header -->