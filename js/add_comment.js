$(document).ready(function() {

    function addComment() {
        var $mailText = $(this).find("#mailText");
        var $comm = $(this).find("#comm");
		  var blog_id = $(this).find("input[name=blog_id]").val();
        var email = $mailText.val();
        var content = $comm.val();

        var payload = {
				blog_id: blog_id,
            email: email,
            content: content
        };

        $.post("addcomment.php", payload).done(function(data) {
            data = JSON.parse(data);

            if (!data.length)
                throw "Malformed response";

            
            if (data[0]["status"] != "good") {
                alert("Unable to publish comment");
					 return;
				}

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
