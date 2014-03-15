$(document).ready(function() {

    function addComment() {
        var $mailText = $(this).find("#mailText");
        var $comm = $(this).find("#comm");
        var email = $mailText.val();
        var content = $comm.val();

        var payload = {
            email: email,
            content: content
        };

        $.post("json/postcomment.php", payload).done(function(data) {
            data = JSON.parse(data);

            if (!data.length)
                throw "Malformed response";

            
            if (data[0]["status"] != "good")
                alert("Unable to publish comment");

            var name = email.indexOf("@") != -1 ? email.substring(0, email.indexOf("@")) : email;

            $("<li>")
                .append($("<span>").addClass("author").append(name))
                .append($("<time>").append(new Date()))
                .append($("<p>").append(content))
                .appendTo("#blog-comments");

            $mailText.val("");
            $comm.val("");

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
