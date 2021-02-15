<?php

namespace App\Model;

use DateTime;

class Article {
	/**
	 * @var string title The title of the article. Purposefully cannot set.
	 */
	private string   $title;
	
	/**
	 * @var string content The content of the article.
	 */
	private string   $content;

	/**
	 * @var DateTime last_revision The DateTime of the last revision.
	 */
	private String $last_revision;
	
	/**
	 * @var DateTime creation_date The DateTime of the initial creation.
	 */
	private String $creation_date;
	
	/**public function __construct (string $title, string $content, DateTime $last_revision, DateTime $creation_date) {
		$this->title         = $title;
		$this->content       = $content;
		$this->last_revision = $last_revision;
		$this->creation_date = $creation_date;
	}**/
	public function __construct (string $title, string $content, String $last_revision, String $creation_date) {
	    $this->title         = $title;
	    $this->content       = $content;
	    $this->last_revision = $last_revision;
	    $this->creation_date = $creation_date;
	}
	
	public function GetTitle () {
		return $this->title;
	}
	
	public function GetContent () {
		return $this->content;
	}
	
	public function SetContent (string $content) {
		$this->content = $content;
	}
	
	public function GetLastRevision () {
		return $this->last_revision;
	}
	
	public function SetLastRevision (DateTime $last_revision) {
		$this->last_revision = $last_revision;
	}
	
	public function GetCreationDate () {
		return $this->creation_date;
	}
}

