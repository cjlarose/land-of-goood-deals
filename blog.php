<?php
	include('helpers/blog.php');
	include('helpers/db_connection.php');

	$b = new Blog($db_connection);
	$articles = $b->get_all();

	include 'header.php';
	$title = "Blog";
	$description = "This is a blog";
?>
<h2>Latest Blog Entries</h2>
<ul id="blog-entries">
<?php
foreach ($articles as $article):
?>
	<li>
		<img src="images/<?php echo $article->image; ; ?>" alt="Character" />
		<h3><?php echo $article->title; ; ?></h3>
		Posted on <?php echo $article->post_date; ;?><br />
		<a href="<?php echo $article->url(); ?>">[&hellip;] Read More</a>
	</li>
<?php
	endforeach;
?>
</ul>
<?php
	include 'footer.php';
?>
