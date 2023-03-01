<form class="header_search" action="<?= home_url('/'); ?>" method="get">
  <input type="text" placeholder="キーワードを入力" name="s" value="<?php the_search_query(); ?>">
  <i class="fas fa-search"></i>
</form>