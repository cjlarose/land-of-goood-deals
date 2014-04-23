<?php

class Blog {
	function __construct($conn) {
		$this->conn = $conn;
	}

	public static function make_article($attributes) {
		return new Article($attributes['id'], $attributes['title'], 
						$attributes['image'], $attributes['blog'], 
						$attributes['post_date']);
	}

	function get_all() {
		$stmt = $this->conn->query("SELECT * FROM blog");
		return array_map(array('Blog', 'make_article'), $stmt->fetchAll());
	}

	function get($name) {
		$sql = "SELECT * FROM blog WHERE title = :name";
		$statement = $this->conn->prepare($sql);
		$statement->execute(array(':name' => $name));
		$result = $statement->fetch();
		if (!$result)
			throw new Exception("Not found");
		return Blog::make_article($result);
	}

}

class Article {

	function __construct($id, $title, $image, $blog, $post_date) {
		$this->id = $id;
		$this->title = $title;
		$this->image = $image;
		$this->blog = $blog;
		$this->post_date = $post_date;
	}

	function url() {
		$name = urlencode($this->title);
		return "article.html?article={$name}";
	}

	function __toString() {
		return "Article({$this->title})";
	}

}
