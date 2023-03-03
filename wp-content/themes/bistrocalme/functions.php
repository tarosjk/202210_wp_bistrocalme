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