<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Gadget Market</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container-fluid py-2">
			<a class="navbar-brand" href="#">Gadget Market</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<form class="d-flex" action="/search" method="POST">
						@csrf
						<input class="form-control me-2" name="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-dark me-5" type="submit" name="submit">Search</button>
					</form>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="/">Home</a>
					</li>
					@if(Session::get('user'))
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="/add">Add</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="/logout">Logout</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="/">{{Session::get('user')}}</a>
						</li>
					@else
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="/register">Signup</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="/login">Login</a>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>