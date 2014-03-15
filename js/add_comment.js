$(document).ready(function() {

    function addComment() {
        var email = $(this).find("#mailText").val();
        var content = $(this).find("#comm").val();
        var payload = {
            email: email,
            content: content
        };
        $.post("json/postcomment.php").done(function(data) {
            data = JSON.parse(data);

            if (!data.length)
                throw "Malformed response";

            
            if (data[0]["status"] != "good")
                alert("Unable to publish comment");

            $("<li>")
                .append($("<span>").addClass("author").append(email))
                .append($("<time>").append(new Date()))
                .append($("<p>").append(content))
                .appendTo("#blog-comments");

        }).error(function() {
            throw "Bad response from server";
        });
    }

    $("#add-comment-form").submit(function(e) {
        e.preventDefault();
        addComment.bind(this)();
        return false;
    });

});
