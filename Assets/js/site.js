$(document).ready(function () {
    $('.post-comment button').click(function () {
        var text = $('.post-comment textarea').val();
        var key = $('.post-comment').attr('data-task-key');

        $.ajax({
            type: "POST",
            url: '/pages/comments.php',
            data: { taskkey: key, description: text },
        }).done(function (success) {
            window.location.reload();
        });

    });
});