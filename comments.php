<?php
/*
 * Template Name: comments.php
 */
?>
<div id="comment_area">
  <?php if (have_comments()): ?>
    <h3 id="comments">コメント</h3>
    <ul id="comments-list">
      <?php wp_list_comments(array('avatar_size' => 48, 'style' => 'ul', 'type' => 'comment')); ?>
    </ul>
  <?php endif; ?>
  <?php comment_form(); ?>
</div>