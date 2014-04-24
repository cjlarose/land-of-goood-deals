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

	function add_comment($blog_id, $email, $content) {
		if (!isset($email) || !isset($content) || $email == "" || $content == "") {
			throw new Exception("Enter some lumping text.");
		} else {
			$cleanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
			$validEmail = filter_var($cleanEmail, FILTER_VALIDATE_EMAIL);

			$cleanComment = htmlentities(filter_var($content, FILTER_SANITIZE_STRING));

			if (strlen($cleanComment) > 1024) {
				throw new Exception("Comment too fricking big.");
			} else {
				$currentDate = date('Y-m-d');
				$sql = "INSERT INTO `blog_comment` ";
				$sql = $sql . "(blog_id, comment, post_date, email) ";
				$sql = $sql . "VALUES (:blog_id, :cleanComment, :currentDate, :validEmail)"; 

				$stmt = $this->conn->prepare($sql);
				$stmt->bindValue(':blog_id', $blog_id, PDO::PARAM_INT);
				$stmt->bindValue(':cleanComment', $cleanComment, PDO::PARAM_STR);
				$stmt->bindValue(':currentDate', $currentDate, PDO::PARAM_STR);
				$stmt->bindValue(':validEmail', $validEmail, PDO::PARAM_STR);
				$stmt->execute();
			}
		}
	}

    function get_all_comments($blog_id) {
        $sql = "SELECT * FROM `blog_comment` WHERE blog_id = :blog_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(':blog_id' => $blog_id));
        return $stmt->fetchAll();
    }

    static function extract_username($email) {
        $index = strpos($email, '@');
        return substr($email, 0, $index);
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
		return "article.php?article={$name}";
	}

	function __toString() {
		return "Article({$this->title})";
	}

}
