<?php 
get_header(); 
get_header("show");

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$the_query = new WP_Query( array(
    'post_status' => 'publish',
    'paged' => $paged,
    'posts_per_page' => 3,
) ); 

?>
  <div class="result-wrapper">
    <div class="result-container">
      <?php if (have_posts()): ?>
        
        <h1>検索結果：『<?php echo esc_html(get_search_query()); ?>』の記事一覧</h1>
        <p class="search-result">
          <?php printf('「%s」の検索結果：%d件見つかりました。', esc_html(get_search_query()), $the_query->found_posts); ?>
        </p>

        <div id="results">
          <? while (have_posts()) : the_post(); ?>
            <div class="result">
              <a href="<?php the_permalink(); ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/book.png" class="daily-planner">
              </a>
              <h2><?php the_title(); ?></h2>
            </div>
          <?php endwhile; ?>
        </div>
      <?php else: ?>
        <h1>検索結果：『<?php echo esc_html(get_search_query()); ?>』の記事一覧</h1>
        <p class="search-result">記事が見つかりませんでした。</p>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>
  </div>
  
<?php get_footer("main"); ?>

<?php get_footer(); ?>