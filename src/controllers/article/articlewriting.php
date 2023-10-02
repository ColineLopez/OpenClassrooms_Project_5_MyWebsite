<?php

namespace MyWebsite\Controllers\Article\ArticleWriting; 

/**
 * class that print the articleWriting template
 */
class ArticleWriting
{
	/**
     * function that print the articleWriting template
     * 
     */
	public function articlewriting() : void
	{
		require('templates/articlewriting.php');
	}
}
