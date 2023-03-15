<?php get_header(); ?>

	<h2 class="pageTitle">最新情報<span>NEWS</span></h2>

  <?php get_template_part('template-parts/breadcrumb'); ?>

	<main class="main">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-9">
          <?php if( have_posts() ): ?>
            <?php while( have_posts() ): the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
              <header class="article_header">
                <h2 class="article_title"><?php the_title(); ?></h2>
                <div class="article_meta">
                  <?php the_category(); ?>
                  <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年m月d日'); ?></time>
                </div>
              </header>

              <div class="article_body">
                <div class="content">
                  <?php the_content(); ?>
                </div>

                <h3>カスタムフィールド</h3>
                <div>
                  <?php
                  $custom_fields = get_post_meta(get_the_ID(), 'test_field');

                  // var_dump($custom_fields);
                  echo $custom_fields[0];
                  ?>
                </div>
                <div>
                <?php
                  $img_id = SCF::get('main_visual');
                  // var_dump($img_id);
                  $img_url = wp_get_attachment_url($img_id);
                  $img_md = wp_get_attachment_image($img_id, 'medium');
                  // var_dump($img_url);
                  // var_dump($img_url_md);
                ?>
                <?= $img_md; ?>
                <img src="<?= $img_url; ?>">
                </div>
                <p>
                  <?= SCF::get('desc'); ?>
                </p>
                <div>
                  <ul>
                  <?php
                    $app_lang = SCF::get('app_lang');
                    // var_dump($app_lang);
                    foreach($app_lang as $val) {
                      echo "<li>{$val}</li>";
                    }
                  ?>
                  </ul>
                </div>
                <div>
                  <?php
                    $gallery = SCF::get('gallery');
                    // var_dump($gallery);
                  ?>
                  <?php foreach($gallery as $galitem): ?>
                  <a href="<?= wp_get_attachment_image_url($galitem['gallery_img'], 'full'); ?>" data-fancybox="gallery">
                    <img src="<?= wp_get_attachment_image_url($galitem['gallery_img']); ?>" alt="">
                  </a>
                  <?php endforeach; ?>
                </div>

                <?php comments_template(); ?>

              </div>

              <div class="postLinks">
                <div class="postLink postLink-prev">
                  <?php previous_post_link(
                    '%link',
                    '<i class="fas fa-chevron-left"></i>%title'
                  ); ?>
                </div>
                <div class="postLink postLink-next">
                  <?php next_post_link(
                    '%link',
                    '%title<i class="fas fa-chevron-right"></i>'
                  ); ?>
                </div>
              </div>
            </article>
            <?php endwhile; ?>
          <?php endif; ?>

				</div>

				<div class="col-12 col-md-3">
					<?php get_sidebar('latests'); ?>
					<?php get_sidebar('categories'); ?>
          <?php get_sidebar('archives'); ?>
				</div>
			</div>
		</div>
	</main>

<?php get_footer(); ?>