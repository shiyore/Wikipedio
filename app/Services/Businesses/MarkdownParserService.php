<?php

namespace App\Services\Businesses;

use Parsedown;

class MarkdownParserService {
	
	/**
	 * Converts markdown text to HTML.
	 * @param string $markdown Markdown text input.
	 * @return string HTML conversion of the markdown.
	 */
	public static function parse (string $markdown): string {
		$parser = new Parsedown();
		$parser->setSafeMode(true);
		return $parser->text ($markdown);
	}
}

