<?php
namespace App\Services\Businesses;
/**
 * Written by Aiden Yoshioka 02/14/21
 * 
 * This is just the business service for the ArticleDAO, it's nothing really complicated. 
 */
use App\Model\Article;
use App\Service\Article\ArticleDAO;
use Illuminate\Support\Facades\Log;

class SecurityService{
    
    //just call's Alec's GetArticle function
    public static function search(String $title){
        $data = ArticleDAO::GetArticle($title);
        Log::info("Searching for : " . $title);
        return $data;
    }
    
    //just call's Alec's DeleteArticle function given a title
    public static function delete(String $title){
        Log::info("Deleting : " . $title);
        return ArticleDAO::DeleteArticle($title);
    }
    
    //just call's Alec's update article function
    public static function edit(Article $article){
        Log::info("Security service: Editing : " . $article->GetTitle());
        return ArticleDAO::UpdateArticle($article);
    }
    
    //currently doesn't work because Alec's code doesn't work with an article object
    public static function create(Article $article){
        Log::info("Security service: Creating a new article : " . $article->GetTitle());
        return ArticleDAO::CreateArticle($article);
    }
    public static function searchArticles(String $search){
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
        Log::info("Security service: Searching for all articles with : " . $search);
=======
>>>>>>> 3d200cda5312af1eb84039a7b2122db46748581b
>>>>>>> Stashed changes
        return ArticleDAO::ArticleSearch($search);
    }
}
?>