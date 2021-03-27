<?php

namespace App\Services\Article;

use App\Model\Article;
use App\Services\Generic\DBConnector;
use Faker\Provider\DateTime;
use Illuminate\Support\Facades\Log;

use Exception;

class ArticleDAO {
	
	/**
	 * Gets all articles created.
	 * @return string|\App\Model\Article[] A list of all articles, or None if there were any exceptions.
	 */
	public static function AllArticles () {
		$conn = DBConnector::GetConnection();
		
		if ($conn->connect_error) {
			echo ("Connection failed: " . $conn->connect_error);
			return None;
		}
		
		try {
			$query  = 'SELECT * FROM `Article`';
			$result = $conn->query ($query);
			
			$articles = array ();
			
			while ($row = $result->fetch_assoc ()) {
				$title         = $row['ArticleTitle'];
				$content       = $row['ArticleContent'];
				$last_revision = $row['LastRevisionDate'];
				$creation_date = $row['CreationDate'];
				
				$articles[] = new Article ($title, $content, $last_revision, $creation_date);
			}
			
			mysqli_free_result($result);
			
			DBConnector::CloseConnection($conn);
			
			Log::info("ArticleDAO: Getting all articles");
			return $articles;
		}
		
		catch (Exception $e) {
		    Log::error("ArticleDAO: Error getting all articles : " . $e->getMessage());
			echo $e->getMessage();
			return None;
		}
	}
	
	/**
	 * Gets a single article by its title.
	 * @param string $title The title of the article.
	 * @return string|\App\Model\Article The article found, or None if there were any exceptions.
	 */
	public static function GetArticle (string $title) {
		$conn = DBConnector::GetConnection();
		
		if ($conn->connect_error) {
			echo ("Connection failed: " . $conn->connect_error);
			return None;
		}
		
		try {
			$query = 'SELECT * FROM `Article` WHERE `ArticleTitle`=?';
			$stmt  = $conn->prepare ($query);
			$stmt->bind_param ('s', $title);
			
			$stmt->execute ();
			$stmt->store_result ();
			$stmt->bind_result ($title, $content, $last_revision, $creation_date);
			$stmt->fetch ();
			
			$article = new Article ($title, $content, DateTime::createFromFormat('D-M-Y', $last_revision), DateTime::createFromFormat('D-M-Y', $creation_date));
			
			DBConnector::CloseConnection($conn);
			
			Log::info("ArticleDAO: Getting article with title : " . $title);
			return $article;
		}
		
		catch (Exception $e) {
			echo $e->getMessage();
			return None;
		}
	}
	
	/**
	 * Updates an article's content and last revision date.
	 * @param Article $article The article data to update with.
	 * @return boolean Whether or not the update was successful.
	 */
	public static function UpdateArticle (Article $article) {
		$conn = DBConnector::GetConnection();
		
		if ($conn->connect_error) {
			echo ("Connection failed: " . $conn->connect_error);
			return False;
		}
		
		try {
			$query = 'UPDATE `Article` SET `ArticleContent`=?, `LastRevisionDate`=? WHERE `ArticleTitle`=?';
			$stmt  = $conn->prepare ($query);
			$stmt->bind_param ('sss', $article->GetContent (), date_default_timezone_get (), $article->GetTitle ());
			
			$success = $stmt->execute ();
			
			DBConnector::CloseConnection($conn);
			
			Log::info("ArticleDAO: Updating article with title: " . $article->GetTitle());
			return $success;
		}
		
		catch (Exception $e) {
			echo $e->getMessage();
			return False;
		}
	}
	
	/**
	 * Creates a new article.
	 * @param string $title The title of the new article.
	 * @return boolean Whether or not the article was successfully created.
	 */
	public static function CreateArticle (string $title) {
		$conn = DBConnector::GetConnection();
		
		if ($conn->connect_error) {
			echo ("Connection failed: " . $conn->connect_error);
			return False;
		}
		
		try {
			$query = 'INSERT INTO `Article` (`ArticleTitle`) VALUES (?)';
			$stmt  = $conn->prepare ($query);
			$stmt->bind_param ('s', $title);
			
			$success = $stmt->execute ();
			
			DBConnector::CloseConnection($conn);
			
			Log::info("ArticleDAO: Creating a new article with the title : " . $title);
			return $success;
		}
		
		catch (Exception $e) {
			echo $e->getMessage();
			return False;
		}
	}
	
	/**
	 * Deletes an article based on its title.
	 * @param string $title The title of the article to delete.
	 * @return boolean Whether or not the article was successfully deleted.
	 */
	public static function DeleteArticle (string $title) {
		$conn = DBConnector::GetConnection();
		
		if ($conn->connect_error) {
			echo ("Connection failed: " . $conn->connect_error);
			return False;
		}
		
		try {
			$query = 'DELETE FROM `Article` WHERE `ArticleTitle`=?';
			$stmt  = $conn->prepare ($query);
			$stmt->bind_param ('s', $title);
			
			$success = $stmt->execute ();
			
			DBConnector::CloseConnection($conn);
			
			return $success;
		}
		
		catch (Exception $e) {
			echo $e->getMessage();
			return False;
		}
	}
}

