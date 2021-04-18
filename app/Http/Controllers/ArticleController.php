<?php
namespace App\Http\Controllers;
/**
 * Written by Aiden Yoshioka 02/14/21
 * 
 * class: ArticleController
 * @package Controllers
 * 
 *  Description: This controller handles all the logic for finding, updating, creating and deleting articles from the database
 */
use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Article;
use App\Services\Businesses\SecurityService;
use App\Services\Businesses\MarkdownParserService;

class ArticleController extends Controller
{
    /**
     * 
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     * 
     * Does as it says when passed a request with an article_title from the search bar
     */
    public function searchArticle(Request $request){
        $title = $request->get("article_title");
        
        echo "<script>console.log('searching...' );</script>";
        
        $article = SecurityService::search($title);
        //$article->SetContent (MarkdownParserService::parse($article->GetContent ()));
        
        return view('ViewArticle' , ['article' => $article]);
    }
    
    /**
     * 
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     * 
     * searches for all articles with the search parameter within the title and body
     */
    public function wildcardSearch(Request $request){
        $search_param = $request->get("article_title");
        
        $articles = SecurityService::searchArticles($search_param);
        return view('SearchResults')->with('articles', $articles);
    }
    
    /**
     * 
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     * 
     * deletes an article by the article's title
     */
    public function deleteRequest(Request $request){
        $title = $request->get('article_title');
        
        return view('DeleteConfirmation', ['article' => SecurityService::search($title)]);
    }
    
    /**
     * 
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     * 
     * confirmation of whether the article wants to be deleted or not
     */
    public function deleteConfirmation(Request $request){
        $title = $request->get('article_title');
        
        if(SecurityService::delete($title)){
            return view('home');
        }else{
            return view('ViewArticle' , ['article' => SecurityService::search($request->get('article_title'))]);
        }
    }
    
    /**
     * 
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     * 
     * updates the body of an article based on the article's title
     */
    public function editArticle(Request $request){
        $title = $request->get("article_title");

        //getting the article from the title
        $article = SecurityService::search($title);

        return view('EditArticle')->with('article',$article);
    }
    
    /**
     * 
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     * 
     * confirms whether or not the user wants to edit an article
     */
    public function editConfirmation(Request $request){
        $title = $request->get("article_title");
        $content = $request->get("article_content");
        $article = new Article($title, $content , date('m/d/Y h:i:s a', time()), date('m/d/Y h:i:s a', time()));
        
        if(SecurityService::edit($article)){
            return view('ViewArticle' , ['article' => SecurityService::search($request->get('article_title'))]);
        }else{
            return view('home');
        }
    }
    
    /**
     * 
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     * 
     * creates a new article from the new article view's form
     */
    public function createArticle(Request $request){
        $title = $request->get("article_title");
        $content = $request->get("article_content");
        $article = new Article($title, $content , date('m/d/Y h:i:s a', time()), date('m/d/Y h:i:s a', time()));
        
        //Ignoring the line below until Alec Fixes his code to work with an article instead of a title only
        $create = SecurityService::create($article);
        echo "<script>console.log('$create'); </script>";
        //returns the view after the article is created
        return view('ViewArticle' , ['article' => $article]);
    }
    
    /**
     * 
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     * 
     * handles whether or not a user wants to delete or edit an article
     */
    public function changeArticle(Request $request){
        //if the edit button is pressed, the code below is run
        if($request->exists("submit_button")){
            return $this->editArticle($request);
        }
        //if the delete button is pressed, the code below is run
        elseif($request->exists("delete_button")){
            return $this->deleteRequest($request);
        }
    }
}
