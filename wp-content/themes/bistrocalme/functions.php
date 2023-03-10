<?php
/**
 * テーマサポートを有効化する
 */
add_theme_support('title-tag'); //titleタグ
add_theme_support('post-thumbnails'); //アイキャッチ画像
add_theme_support('menus'); //メニュー機能
add_theme_support('html5'); //HTML5にタグを変換

function my_document_title_separator($separator) {
  $separator = '|';
  return $separator;
}
add_filter('document_title_separator', 'my_document_title_separator');

function my_document_title_parts($title) {
  if( is_home() ) {
    unset( $title['tagline'] );
    $title['title'] .= 'は、カジュアルなワインバーよりのビストロです。';
  }
  return $title;
}
add_filter('document_title_parts', 'my_document_title_parts');


function my_comment_form_default_fields($args) {
  // echo '<pre>';
  // var_dump($args);
  // echo '</pre>';
  $args['author'] = ''; //名前
  $args['email'] = ''; //メールアドレス
  $args['url'] = '';// サイトアドレス

  return $args;
}
add_filter('comment_form_default_fields', 'my_comment_form_default_fields');


// １ページに表示する記事の件数を制限する（TOPページのみ）
function my_pre_get_posts($query) {
  if(is_admin() || !$query->is_main_query() ) {
    return; //この関数の処理ストップ
  }

  // トップページの場合のみ is_home もしくは is_front_page
  if( is_home() ) {
    $query->set('posts_per_page', 3);
    return;
  }
}
add_action('pre_get_posts', 'my_pre_get_posts');


function my_wpautop() {
  if( is_page('contact') ) {
    remove_filter('the_content', 'wpautop');
  }
}
add_action('wp','my_wpautop');


function my_editor_support() {
  add_theme_support('editor-styles');//must
  add_editor_style('assets/css/editor-style.css'); //default: editor-style.css
}
add_action('admin_init', 'my_editor_support');


function my_require_login() {
  global $pagenow;
  if( !is_user_logged_in() && $pagenow !== 'wp-login.php' ) {
    auth_redirect();//ログインページ or 管理ページに飛ばす
  }
}
// add_action('init', 'my_require_login');