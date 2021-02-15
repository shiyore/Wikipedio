<html>
<!-- 
    Written by Aiden Yoshioka
    
    This is just the basic template for all the articles to be output. If I find time, I will be encorporating parsedown to format the articles to look better.
 -->
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
	@extends('layouts.navbar')
	@section('navbar')

	@section('content')
		<p><h1 class="display-1 text-center">{{$article->GetTitle()}}</h1></p>
		<hr/>
		<br/>
		<p class="text-left font-weight-normal">{{$article->GetContent()}}</p>
		<div class="container">
          <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                <form action="ChangeArticle" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="article_title" value={{$article->GetTitle()}}>
                    <input type="hidden" name="article_content" value={{$article->GetContent()}}>
                    <div class="row">
                        <div class="col-sm-4"><button id="submit_button" name="submit_button" type="submit" class="btn btn-primary ">Edit</button></div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4"><button id="delete_button" name="delete_button" type="submit" class="btn btn-danger ml-5">Delete</button></div>
                    </div>
                </form>
            </div>
            <div class="col-sm-2">
         	</div>
         </div>
        </div>
	@stop
</body>
</html>