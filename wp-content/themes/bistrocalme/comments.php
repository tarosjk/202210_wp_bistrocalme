<section class="comments" id="comments">
    <?php
    comment_form([
        'title_reply' => 'コメント投稿フォーム',
    ]);
    if ( have_comments() ) :
    ?>
        <p><?php comments_number(
            'コメントがありません。',
            'コメントが1件あります。',
            'コメントが%件あります。'
        ); ?></p>
        <ol class="commentlist">
            <?php wp_list_comments([
                'avatar_size' => 50,
            ]); ?>
        </ol>
    <?php
    paginate_comments_links([
        'prev_text' => '←前のコメントページ',
        'next_text' => '次のコメントページ→'
    ]);
    endif;
    ?>
</section>
