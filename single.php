<?php get_header(); ?>

<?php get_header("show"); ?>

<div class="articles">
  <div class="article">
    <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
    <div class="time-tag">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
      <?php
        $tags = get_the_tags();
        foreach ($tags as $tag) {
          echo "<a href='" . get_tag_link($tag->term_id) . "/#product-wrapper'>" . $tag->name . "</a>";
        }
      ?>
    </div>   
    <p><?php the_content(); ?></p>
  </div> 
</div>

<?php get_footer("main"); ?>

<?php get_footer(); ?>