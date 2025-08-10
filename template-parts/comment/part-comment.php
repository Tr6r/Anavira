<?php
if (post_password_required()) return;

// Lấy và sắp xếp comment
$comments = get_comments([
    'post_id' => get_the_ID(),
    'status' => 'approve',
    'orderby' => 'comment_date_gmt',
    'order' => 'ASC'
]);

// Xây cây comment cha – con
function build_comment_tree($comments)
{
    $by_parent = [];

    foreach ($comments as $comment) {
        $by_parent[$comment->comment_parent][] = $comment;
    }

    $build_branch = function ($parent_id = 0) use (&$build_branch, $by_parent) {
        $branch = [];

        if (!empty($by_parent[$parent_id])) {
            foreach ($by_parent[$parent_id] as $comment) {
                $comment_data = [
                    'comment' => $comment,
                    'children' => $build_branch($comment->comment_ID)
                ];
                $branch[] = $comment_data;
            }
        }

        return $branch;
    };

    return $build_branch(0);
}


$nested_comments = build_comment_tree($comments);

// Hàm hiển thị comment
function render_comments($comment_tree, $depth = 1)
{
    echo '<ul class="comment-list">';
    foreach ($comment_tree as $node) {
        $comment = $node['comment'];

        echo '<li id="comment-' . $comment->comment_ID . '">';
        echo '<strong>' . esc_html($comment->comment_author) . '</strong>';

        // Hiển thị thời gian
        echo ' <span class="comment-date">';
        echo esc_html( get_comment_date( 'H:i d/m/Y', $comment ) );
        // echo '</span><br>';

        echo '<p>' . esc_html($comment->comment_content) . '</p>';

        // Dùng comment_reply_link đúng chuẩn
        echo get_comment_reply_link([
            'reply_text' => 'Trả lời',
            'depth'      => $depth,
            'max_depth'  => get_option('thread_comments_depth'),
        ], $comment->comment_ID, get_the_ID());

        // Render con nếu có
        if (!empty($node['children'])) {
            render_comments($node['children'], $depth + 1);
        }

        echo '</li>';
    }
    echo '</ul>';
}



?>

<div class="comments-wrap">

    <?php
    comment_form([
        'logged_in_as' => '',
        'comment_notes_before' => '',
        'comment_notes_after'  => '',
        'title_reply'          => '',
        'label_submit'         => 'Đăng bình luận',
        'comment_field' => '
        <p class="comment-form-comment">
            <label class="comment-title-textarea" for="comment">Nội dung bình luận</label>
            <textarea  class="comment-form-textarea" id="comment" name="comment" cols="45" rows="5" aria-required="true"></textarea>
        </p>
    ',
        'fields' => [
            'author' => '
            <p class="comment-form-author">
                <label class="comment-title-textarea" for="author">Họ và tên</label>
                <input class="comment-auther-textarea" id="author" name="author" type="text" value="" size="30" />
            </p>
        ',
            // Không thêm email, website nữa
        ],
    ]);
    ?>
    <h3><?php echo count($comments); ?> bình luận</h3>

    <?php render_comments($nested_comments); ?>

</div>