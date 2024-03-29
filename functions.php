<?php 

  add_action('init', 'create_post_type');

  function create_post_type() {
    register_post_type( 'news', //カスタム投稿タイプ名。自由指定可。
       array(
            'label' => 'ニュース', //WP管理画面のサイドバーに表示するカスタム投稿タイプ名。自由指定可
            'labels' => array(
            'all_items' => 'NEWS', //記事一覧ページの名前。自由指定可。
            ),
            'menu_position' => 5, //サイドバーでの表示順序
            'public' => true,
            'has_archive' => true,
            'supports' => array('title')
        )
    );
  }

  function custom_search_query($query) {
    if (!is_admin() && $query->is_search) {
        $query->set('posts_per_page', 3);
    }
    return $query;
  }

  add_filter('pre_get_posts', 'custom_search_query');
