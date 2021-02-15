<?php
namespace App\Services\Businesses;
/**
 * Written by Aiden Yoshioka 02/14/21
 * 
 * This is just the business service for the ArticleDAO, it's nothing really complicated. 
 */
use App\Model\Article;
use App\Service\Article\ArticleDAO;

class SecurityService{
    
    //just call's Alec's GetArticle function
    public static function search(String $title){
        $data = ArticleDAO::GetArticle($title);
        return $data;
    }
    
    //just call's Alec's DeleteArticle function given a title
    public static function delete(String $title){
        return ArticleDAO::DeleteArticle($title);
    }
    
    //just call's Alec's update article function
    public static function edit(Article $article){
        return ArticleDAO::UpdateArticle($article);
    }
    
    //currently doesn't work because Alec's code doesn't work with an article object
    public static function create(Article $article){
        return ArticleDAO::CreateArticle($article);
    }
}
?>