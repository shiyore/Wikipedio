<?php
use App\Model\Article;
/**
 * Written by Aiden Yoshioka on 02/14/21
 * 
 * This is just the routing for our pages, nothing special
**/

Route::get('/', function () {
    echo "<script>console.log('Going home...' );</script>";
    return view('home');
});
Route::get('/new', function () {
    return view('newArticle');
});
Route::get('/search', function () {
    return view('newArticle');
});
Route::post('/findArticle', 'ArticleController@searchArticle');
Route::get('/view',function(){
    return view('ViewArticle')->with('article', new Article("Example Title", "Example Text. More example text." , date('m/d/Y h:i:s a', time()), date('m/d/Y h:i:s a', time())));
});
Route::post('/CreateArticle', 'ArticleController@createArticle');
Route::post('/ChangeArticle', 'ArticleController@changeArticle');
Route::post('/EditArticle', 'ArticleController@editConfirmation');
Route::post('/DeleteArticle', 'ArticleController@deleteConfirmation');