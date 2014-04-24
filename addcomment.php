<?php
	include 'include/header.php';
	$title = "Add Comment";
	$description = "Adds a comment";
?>
<h2>Add Comment</h2>
<form action="article.php" method="GET">
   <fieldset class="commborder">
      <legend>Add Comment to Article</legend>
      <label for="mailText">Email</label>
      <input type="text" name="mailText" value="" id="mailText" /><br />
      <label for="comm">Comment</label><br />
      <textarea name="comment" id="comm"></textarea><br />
      <input class="addcomm" type="submit" value="Add Comment" />
   </fieldset>
</form>
<?php
	include 'include/footer.php';
?>
