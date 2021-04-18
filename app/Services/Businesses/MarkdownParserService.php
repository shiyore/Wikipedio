<?php

namespace App\Services\Businesses;

use Illuminate\Support\Facades\Log;
use Parsedown;

/**
 * 
 * @author Alec
 * 
 * used to translate our article content from markdown to html
 *
 */
class MarkdownParserService {
	
	/**
	 * Converts markdown text to HTML.
	 * @param string $markdown Markdown text input.
	 * @return string HTML conversion of the markdown.
	 */
	public static function parse (string $markdown): string {
		$parser = new Parsedown();
		$parser->setSafeMode(true);
		Log::info("Parsing markdown to html");
		return $parser->text ($markdown);
	}
}

