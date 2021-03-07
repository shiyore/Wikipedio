<?php
namespace App\Http\Controllers;
/**
 * Written by Aiden Yoshioka 02/14/21
 * 
 * I'm not too experienced with laravel, as I'm taking the class concurrently with this one. I did my best to use the best practices that I've learned at this point. 
 */
use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Article;
use App\Services\Businesses\SecurityService;
use App\Services\Businesses\MarkdownParserService;

class ArticleController extends Controller
{
    //Does as it says when passed a request with an article_title from the search bar
    public function searchArticle(Request $request){
        $title = $request->get("article_title");
        
        echo "<script>console.log('searching...' );</script>";
        
        $article = SecurityService::search($title);
        $article->SetContent (MarkdownParserService::parse($article->GetContent ()));
        
        return view('ViewArticle' , ['article' => $article]);
    }
    
    public function deleteRequest(Request $request){
        $title = $request->get('article_title');
        
        return view('DeleteConfirmation', ['article' => SecurityService::search($title)]);
    }
    public function deleteConfirmation(Request $request){
        $title = $request->get('article_title');
        
        if(SecurityService::delete($title)){
            return view('home');
        }else{
            return view('ViewArticle' , ['article' => SecurityService::search($request->get('article_title'))]);
        }
    }
    
    public function editArticle(Request $request){
        $title = $request->get("article_title");

        //getting the article from the title
        $article = SecurityService::search($title);

        return view('EditArticle')->with('article',$article);
    }
    
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
