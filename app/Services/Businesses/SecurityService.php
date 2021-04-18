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
    
    /**
     * @param String
     * @return Article array
     * just call's Alec's GetArticle function
     *
     */
    public static function search(String $title){
        $data = ArticleDAO::GetArticle($title);
        Log::info("Searching for : " . $title);
        return $data;
    }
    
    /**
     * @param String
     * @return Article
     * just call's Alec's DeleteArticle function given a title
     *
     */
    public static function delete(String $title){
        Log::info("Deleting : " . $title);
        return ArticleDAO::DeleteArticle($title);
    }
    
    /**
     * @param Article
     * @return boolean
     * 
     * just call's Alec's update article function
     *
     **/
    public static function edit(Article $article){
        Log::info("Security service: Editing : " . $article->GetTitle());
        return ArticleDAO::UpdateArticle($article);
    }
    
    //currently doesn't work because Alec's code doesn't work with an article object
    public static function create(Article $article){
        Log::info("Security service: Creating a new article : " . $article->GetTitle());
        return ArticleDAO::CreateArticle($article);
    }
    
    /**
     * 
     * @param String $search
     * @return string|\App\Model\Article
     * 
     * retrieves an article by a saarch parameter
     */
    public static function searchArticles(String $search){
        Log::info("Security service: Searching for all articles with : " . $search);
        return ArticleDAO::ArticleSearch($search);
    }
}
?>