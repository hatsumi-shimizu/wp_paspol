<?php get_header(); ?>

<?php get_header("main"); ?>

  <div id="top-wrapper">
    <div class="top-container">
      <h1>旅に出よう。</h1>
      <div class="txt">
        <p>僕たちが作りたいのは</p>
        <p>持っているだけで旅に出たくなるモノ。</p>
        <p>持っているだけでワクワクするモノ。</p>
      </div>
      <div class="txt">
        <p>それは新しい時代の“パスポート”</p>
        <p>僕たちが作るものは、</p>
        <p>そんな、存在でありたい。</p>
      </div>
      <div class="txt">
        <p>そして、人と人が繋がる</p>
        <p>こんな時代だからこそ</p>
        <p>僕たちは、みんなでひとつのモノを</p>
        <p>作ることを追求したい。</p>
      </div>
      <div class="txt-except">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/paspol-text-logo.png">
      </div>
      <div class="txt">
        <p>それは、自分と世界を繋げる</p>
        <p>旅のものづくりブランド</p>
      </div>
    </div>
  </div>

  <div id="product-wrapper">
    <div class="product-container">
      <div class="title">
          <h1>PRODUCT</h1>
          <div class="btn">
            <button class="more">MORE<i class="fa-solid fa-chevron-right fa-xs"></i></button>
          </div>
      </div>
      <div class="search">
        <?php get_search_form(); ?>
      </div>

      <div id="products">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <div class="product">
              <a href="<?php the_permalink(); ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/book.png" class="daily-planner">
              </a>
              <h2><?php the_title(); ?></h2>
            </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>

  <div id="news-wrapper">
    <div class="news-container">
      <div class="title">
        <h1>NEWS</h1>
        <div class="btn">
          <button class="more">MORE<i class="fa-solid fa-chevron-right fa-xs"></i></button>
        </div>
      </div>
    
      <?php
        $args = array(
          'post_type' => 'news',
          'posts_per_page' => 6
        );
        $my_query = new WP_Query($args);
        while ($my_query->have_posts()) : $my_query->the_post(); 
      ?> 
      <a class="news-link" href="<?php the_permalink(); ?>">
        <div class="news-set">  
          <img src="<?php echo wp_get_attachment_image_src(post_custom('image'),'full')[0]; ?>">
          <div class="news-txt">
            <h3><?php the_title(); ?></h3>
            <div class="txt-small">
              <p><?php the_time('Y.m.d'); ?></p>
              <p class="content"><?php echo esc_html(post_custom('textarea')); ?><p>
            </div>
          </div>
        </div>
      </a> 
      
      <?php 
        endwhile; 
        wp_reset_postdata(); 
      ?>
    </div>
  </div>

  <?php get_footer("main"); ?>

  <?php get_footer(); ?>