<?php
if (post_password_required()) return;

global $typepost;

// Lấy comment của bài hiện tại
$comments = get_comments([
    'post_id' => get_the_ID(),
    'status'  => 'approve',
    'orderby' => 'comment_date_gmt',
    'order'   => 'DESC',
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
                    'comment'  => $comment,
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
        echo esc_html(get_comment_date('H:i d/m/Y', $comment));
        echo '</span>';

        echo '<p>' . esc_html($comment->comment_content) . '</p>';

        // Thay vì get_comment_reply_link(), ta dùng nút + form container
        echo '<a href="#" class="reply-link" data-comment-id="' . $comment->comment_ID . '">Trả lời</a>';
        echo '<div class="reply-form-container" id="reply-form-' . $comment->comment_ID . '" style="display:none;"></div>';

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
        ],
    ], get_the_ID());
    ?>
    <h3><?php echo count($comments); ?> bình luận</h3>

    <?php render_comments($nested_comments); ?>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hiện/ẩn form reply khi click nút "Trả lời"
        document.querySelectorAll('.reply-link').forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                let commentId = this.dataset.commentId;
                let container = document.getElementById('reply-form-' + commentId);

                if (container.innerHTML.trim() === '') {
                    container.innerHTML = `
                        <input
                            id="reply-author-${commentId}"
                            class="comment-auther-textarea"
                            type="text"
                            name="author"
                            placeholder="Họ và tên"
                            style="width: 100%; margin-bottom: 8px;"
                        />
                        <textarea
                            id="reply-content-${commentId}"
                            class="comment-form-textarea"
                            placeholder="Nhập câu trả lời..."
                            rows="4"
                            style="width:100%;"
                        ></textarea>
                        <br>
                        <button
                            id="reply-send-${commentId}"
                            class="comment-button-reply send-reply"
                            type="button"
                            data-parent-id="${commentId}"
                        >Gửi</button>
                    `;
                }

                container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';

                if (container.style.display === 'none') {
                    container.innerHTML = '';
                }
            });
        });

        // Xử lý gửi reply comment qua AJAX (delegated event)
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('send-reply')) {

                let parentId = e.target.dataset.parentId;
                let container = e.target.parentElement;
                let textarea = container.querySelector('textarea');

                if (!textarea) {
                    alert('Đã xảy ra lỗi, vui lòng thử lại.');
                    return;
                }

                let content = textarea.value.trim();
                let authorInput = container.querySelector('input[name="author"]');
                let authorName = authorInput ? authorInput.value.trim() : '';

                if (!authorName) {
                    alert('Vui lòng nhập họ và tên');
                    return;
                }
                if (!content) {
                    alert('Vui lòng nhập nội dung trả lời');
                    return;
                }


                // Bỏ comment để test fetch thật
                fetch(CommentAjaxVars.ajaxurl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: new URLSearchParams({
                            action: 'submit_comment_reply',
                            nonce: CommentAjaxVars.nonce,
                            comment_post_ID: CommentAjaxVars.post_id,
                            comment_parent: parentId,
                            comment_content: content,
                            comment_author: authorName,
                        }),
                    })
                    .then(res => {
                        return res.json();
                    })
                    .then(data => {
                        if (data.success) {
                            container.innerHTML = '';
                            container.style.display = 'none';

                            // TODO: reload hoặc update lại phần comment nếu cần
                        } else {
                            alert('Đã xảy ra lỗi, vui lòng thử lại.');
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Đã xảy ra lỗi, vui lòng thử lại.');
                    });
            }
        });
    });
</script>