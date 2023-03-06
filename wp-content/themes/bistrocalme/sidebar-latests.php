<?php
$args = [
  'post_type' => 'post', //投稿タイプが「投稿」のもの
  'posts_per_page' => 5, //１ページに表示する件数
 ];

$the_query = new WP_Query($args);

?>
<?php if ($the_query->have_posts()) : ?>
  <aside class="archive">
    <h2 class="archive_title">最新記事</h2>
    <ul class="archive_list">
      <?php while ($the_query->have_posts()) : $the_query->the_post(); 
      //$postの中身が書き換わる
      ?>
        <li>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>
      <?php endwhile; ?>
      <?php
      wp_reset_postdata();
      // $postの中身をメインクエリの結果に差し戻す
      ?>
    </ul>
  </aside>
<?php endif; ?>