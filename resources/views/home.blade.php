<html>
<!-- Written by Aiden Yoshioka,
    Just the home page for our site, it just has a search bar and the navbar on it. It's just meant to be as basic as possible.
 -->
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
	@extends('layouts.navbar')
	@section('navbar')

	@section('content')
		<div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form action="{{url('findArticle')}}" method="post" class="card card-sm">
                            	{{csrf_field()}}
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input name="article_title" id="article_title" class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
	@stop
</body>
</html>