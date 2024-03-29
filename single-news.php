<?php get_header(); ?>

<?php get_header("show"); ?>

<div id="column-container">
  <div id="column-1">
    <div class="article-show">
      <?php
        $args = array(
          'post_type' => 'news',
          'posts_per_page' => 6
        );
        $my_query = new WP_Query($args); 
      ?>
      <div id="title">
        <h2><?php the_title(); ?></h2>
      </div>
      <div id="created_at">
        <p><?php the_time('Y.m.d'); ?></p>
      </div>
      <div id="eye-catch">
        <img src="<?php echo wp_get_attachment_image_src(post_custom('image'),'full')[0]; ?>">
      </div>
      <div>
        <p><?php echo nl2br(esc_html(post_custom('textarea'))); ?></p>
      </div>
      <div id="related-article">
        <h3>関連記事</h3>
        <?php
          global $post;
          $args = array(
          'numberposts' => 5, //８件表示(デフォルトは５件)
          'post_type' => 'news', //カスタム投稿タイプ名
          'orderby' => 'rand', //ランダム表示
          'post__not_in' => array($post->ID) //表示中の記事を除外
          );
        ?>
        <?php $myPosts = get_posts($args); if($myPosts) : ?>
          <?php foreach($myPosts as $post) : setup_postdata($post); ?>
            <p>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </p>  
           <?php endforeach; ?>
        <?php else : ?>
          <p>関連記事はありません。</p>
        <?php endif; wp_reset_postdata(); ?>
      </div>
    </div>
  </div> 
     
  <div id="column-2">
    <div id="article-index">
      <h3>新着記事一覧</h3>
      <?php
        $args = array(
          'posts_per_page' => 5 // 表示件数の指定
        );
        $posts = get_posts( $args );
        foreach ( $posts as $post ): // ループの開始
        setup_postdata( $post ); // 記事データの取得
      ?>
      <p>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </p>
      <?php
        endforeach; // ループの終了
        wp_reset_postdata(); // 直前のクエリを復元する
      ?>
    </div>
    <div id="category-index">
      <h3>カテゴリー一覧</h3>
      <?php 
        $categories = get_categories( array(
          'orderby' => 'name',
          'order' => 'ASC'
        ));
        foreach( $categories as $category ) {
          echo "<a href='http://localhost:18000/#product-wrapper'>" . $category->name . "</a>";
          echo '<br>';
          echo "<a href='http://localhost:18000/#news-wrapper'>ニュース</a>";
        }
      ?>
    </div>
    <div id="tag-index">
      <h3>タグ一覧</h3>
        <?php 
          $tags = get_tags(array(
            'orderby' => 'name',
            'order' => 'ASC'
          ));
          foreach( $tags as $tag ) {
            echo "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'><path d='M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z'/></svg>";
            echo "<a href='" . get_tag_link($tag->term_id) . "/#product-wrapper'>" . $tag->name . "</a>";
            echo "<br>";
          }
        ?>
    </div>
    <div id="banner">
      <!-- 外部サイトへのリンク -->
      <a href="https://pas-pol.jp/">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/banner.png">
      </a>
    </div>
  </div>
</div>

<?php get_footer("main"); ?>

<?php get_footer(); ?>