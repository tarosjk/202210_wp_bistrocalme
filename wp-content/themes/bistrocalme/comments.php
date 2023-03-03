<section class="comments">
    <?php
    comment_form([
        'title_reply' => 'コメント投稿フォーム',
    ]);
    if ( have_comments() ) :
    ?>
        <p><?php comments_number(); ?></p>
        <ol class="commentlist">
            <?php wp_list_comments(); ?>
        </ol>
    <?php
    paginate_comments_links();
    endif;
    ?>
</section>
