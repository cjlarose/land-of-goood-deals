<?php
	include('helpers/blog.php');
	include('helpers/db_connection.php');

	if (!array_key_exists('article', $_GET)) {
		echo "Bad request";
		http_response_code(400);
		exit();
	}

	$b = new Blog($db_connection);
	$name = urldecode($_GET['article']);
	try {
		$article = $b->get($name);
	} catch(Exception $e) {
		echo "Not Found";
		http_response_code(404);
		exit();
	}

	include 'include/header.php';
	$title = "Article page";
	$description = "This is an article";
?>
<h2><?php echo $article->title; ?></h2>
<p>Posted on <?php echo $article->post_date; ?></p>

<img src="images/<?php echo $article->image; ?>" alt="Blog Image" class="article-image" />
<p><?php echo $article->blog; ?></p>
<h3>Comments</h3>
<ul id="blog-comments"></ul>

<h3>Add Comment</h3>
<form action="article.php" method="GET" id="add-comment-form">
   <fieldset class="commborder">
      <legend>Add Comment to Article</legend>
      <label for="mailText">Email</label>
      <input type="text" name="mailText" value="" id="mailText" /><br />
      <label for="comm">Comment</label><br />
      <textarea name="comment" id="comm"></textarea><br />
		<input type="hidden" name="blog_id" value="<?php echo $article->id; ?>" />
      <input class="addcomm" type="submit" value="Add Comment" />
   </fieldset>
</form>

<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/add_comment.js"></script>
<?php
	include 'include/footer.php';
?>
