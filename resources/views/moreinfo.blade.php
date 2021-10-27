@extends('layout')

@section('content')
	<div class="container">
		<div class="row my-5">
			<div class="col-md-6 m-auto">
				<div class="card card-body">
						<div class="col">
							<div class="card h-100">
								<img src="{{asset('storage/uploads/' . $product['image'])}}" alt="">
								<div class="card-body">
									<h5 class="card-title">{{$product['name']}}</h5>
									<h6 class="card-title">Rating: {{$productAvgRating}}</h6>
									<h6 class="card-title">Type: {{$product['type']}}</h6>
									<h6 class="card-title">Brand: {{$product['brand']}}</h6>
									<h6 class="card-title">Price: {{$product['price']}}</h6>
								</div>
								@if(Session::get('user'))
									<a href="/rating/{{$product['id']}}" class="btn btn-outline-success form-control mt-2">Rate Product</a>
									<a href="/edit/{{$product['id']}}" class="btn btn-outline-primary form-control mt-2">Edit</a>
									<a href="/delete/{{$product['id']}}" class="btn btn-outline-danger form-control mt-2">Delete</a>
								@endif
							</div>
							<div class="mt-2">
								<small>Read Reviews:</small>
								@foreach($ratings as $rating)
								<div class="card card-body mt-2">
									<h6>{{$rating['username']}}</h6>
									<small>{{$rating['created_at']}}</small>
									<h6>Rating: {{$rating['rating']}}</h6>
									<p>{{$rating['review']}}</p>
								</div>
								@endforeach
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
@stop