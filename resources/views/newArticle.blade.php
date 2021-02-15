<html>
<!-- 
    Written by Aiden Yoshioka
    
    This is the page for creating a new article on our site. Later, we will have the site incorporate parsedown so we can use markdown for the article pages.  I, however, don't have the time or energy to do all that tonight.
 -->
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
	@extends('layouts.navbar')
	@section('navbar')

	@section('content')
		<form action="CreateArticle" method="post">
			{{csrf_field()}}
          <div class="form-group">
            <label for="article_title">Article Title</label>
            <input type="text" class="form-control" name="article_title" id="article_title" placeholder="Article Title">
          </div>
          <div class="form-group">
            <label for="article_content">Article Content</label>
            <textarea class="form-control" name="article_content" id="article_content" rows="3"></textarea>
          </div>
          <button class="btn btn-lg btn-success" type="submit">Submit</button>
        </form>
	@stop
</body>
</html>