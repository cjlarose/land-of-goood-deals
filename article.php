<?php
	include 'header.php';
	$title = "Article page";
	$description = "This is an article";
?>
<h2>Added cool new products!</h2>
<p>Posted on <time datetime="2014-01-30T00:00:00">January 30, 2014</time></p>

<img src="images/princess-bubblegum.png" alt="Princess Bubblegum" class="article-image" />

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum viverra 
ut augue eget egestas. Nunc sapien turpis, rhoncus vitae euismod vitae, 
volutpat non ipsum. Nulla in semper lorem. Curabitur lacinia egestas suscipit. 
Aliquam cursus, felis posuere molestie pretium, orci massa vestibulum tortor, 
ut feugiat augue leo vel nisl. Sed sed elit eleifend lacus lacinia commodo a ut 
metus. Sed pulvinar urna metus, sit amet porttitor tellus sollicitudin id. 
Curabitur ac accumsan metus, quis pharetra ante. Class aptent taciti sociosqu 
ad litora torquent per conubia nostra, per inceptos himenaeos. Cras at nibh 
in nisi ultrices viverra sit amet et sapien. Donec aliquet viverra eros et 
tincidunt. Sed sodales enim non orci dictum pretium sit amet sed quam.</p>

<p>Integer quis odio felis. Aliquam metus sapien, commodo vel accumsan at,
malesuada id massa. Pellentesque tincidunt ut eros id pharetra. Sed mi est,
gravida et mauris a, scelerisque condimentum metus. Pellentesque iaculis,
tellus quis elementum consectetur, neque nulla molestie nisi, eu tincidunt
justo eros id justo. Vestibulum tempor tempus felis, et faucibus erat feugiat
sit amet. Fusce tincidunt sapien id rutrum sollicitudin. Fusce odio erat,
fermentum vitae rhoncus sed, sollicitudin sed nibh. Nunc euismod augue eget
dolor commodo, at dictum elit mollis. Ut quis mollis elit, vitae dapibus eros.
Aliquam erat volutpat. Proin sagittis ante in mi aliquet malesuada. In ut
faucibus eros, vitae volutpat nibh. Donec vitae ante euismod, pretium tortor
sed, suscipit dui. Nulla et vestibulum erat.</p>

<p>Etiam elementum venenatis urna sed condimentum. Sed luctus urna in nibh viverra
varius. Sed non feugiat purus. Proin euismod erat lectus, sit amet pellentesque
purus convallis sed. Integer et urna eros. Pellentesque vel adipiscing arcu.
Nullam rhoncus, ante sit amet varius blandit, augue turpis pharetra diam,
malesuada consectetur lectus turpis quis enim.</p>

<p>Proin aliquam lacinia congue. Vestibulum malesuada sit amet sem et dapibus.
Etiam consectetur sollicitudin dolor sed vulputate. Lorem ipsum dolor sit amet,
consectetur adipiscing elit. Nullam eget justo pellentesque nisi lobortis
posuere. In dignissim erat et tellus egestas egestas. Vivamus vulputate rhoncus
ligula, id iaculis felis adipiscing ut. Curabitur felis mi, ultrices sit amet
massa quis, faucibus tempor velit. Sed fermentum, lacus ultricies ultricies
eleifend, augue felis posuere libero, in vulputate tellus turpis eu nisi.
Aliquam faucibus fermentum sapien at scelerisque. Pellentesque sed mollis
risus. Fusce scelerisque interdum faucibus. Donec non magna a nisl rutrum
consequat ut eget odio. Praesent quis vestibulum ligula, vel viverra ante.
Vestibulum egestas tortor id velit pulvinar vehicula.</p>

<p>Proin ornare bibendum ante, eget sollicitudin tortor mollis quis. Cras 
interdum erat in est viverra, eu vulputate tellus eleifend. Vestibulum id 
tempus quam. Proin sagittis, sapien quis dictum eleifend, turpis ante 
bibendum sem, ut facilisis ipsum dolor ut odio. Maecenas fermentum lorem nisl, 
sed consectetur diam elementum sed. Cras ut libero a elit luctus aliquam ac 
rutrum nulla. Aenean egestas egestas dignissim.</p>

<h3>Comments</h3>
<ul id="blog-comments"></ul>

<h3>Add Comment</h3>
<form action="article.html" method="GET" id="add-comment-form">
   <fieldset class="commborder">
      <legend>Add Comment to Article</legend>
      <label for="mailText">Email</label>
      <input type="text" name="mailText" value="" id="mailText" /><br />
      <label for="comm">Comment</label><br />
      <textarea name="comment" id="comm"></textarea><br />
      <input class="addcomm" type="submit" value="Add Comment" />
   </fieldset>
</form>

<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/add_comment.js"></script>
<?php
	include 'footer.php';
?>
