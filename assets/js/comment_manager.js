document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("#commentform");
    const author = document.querySelector("#author");
    const comment = document.querySelector("#comment");

    form.addEventListener("submit", function (e) {
        let valid = true;

        // Reset style trước
        [author, comment].forEach(field => {
            field.style.borderColor = "";
        });

        // Kiểm tra tên
        if (!author.value.trim()) {
            author.style.border = "2px solid red";
            valid = false;
        }

        // Kiểm tra nội dung bình luận
        if (!comment.value.trim()) {
            comment.style.border = "2px solid red";
            valid = false;
        }

        // Nếu có lỗi thì chặn submit
        if (!valid) {
            e.preventDefault();
        }
    });
});
