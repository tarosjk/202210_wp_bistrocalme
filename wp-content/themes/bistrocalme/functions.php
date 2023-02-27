<?php
/**
 * テーマサポートを有効化する
 */
add_theme_support('title-tag'); //titleタグ
add_theme_support('post-thumbnails'); //アイキャッチ画像

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