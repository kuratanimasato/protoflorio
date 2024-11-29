<?php
/*
 * Template Name: footer.php
 */
?>
<!-- footer -->
<?php
get_template_part('templates/pagetop');
?>
<footer class="footer">
  <div class="footer-nav">
    <?php
    wp_nav_menu(array(
      'theme_location' => 'footer_nav',
      'menu_class' => 'footer-list',
      'container' => false,
      'depth' => 1,
      'items_wrap' => '<ul class="%2$s">%3$s</ul>',
      'add_li_class' => 'footer-item',
      'link_class' => 'footer-link',
    ));
    ?>
  </div>
  <div class="copyright"><?php bloginfo('name'); ?></div>

</footer>
<!-- /footer -->

</div>
<?php wp_footer(); ?>
</body>

</html>