@extends('layout')

@section('content')
	<div class="container">
		<div class="row my-5 py-4">
			<div class="col-md-12 m-auto">
				<div class="card card-body">
					@if($products->isEmpty())
						@if(Session::get('user'))
							<h3 class="text-center"><a href="/add" class="nav-link">Add products data</a></h3>
						@else
							<h3 class="text-center"><a href="/login" class="nav-link">Please Login & Add products data</a></h3>
						@endif
					@else
						@if(Session::get('status'))
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<div class="text-center">{{Session::get('status')}}</div>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						@endif
						<div class="row row-cols-1 row-cols-md-5 g-4">
							@foreach($products as $product)
							<div class="col">
								<div class="card h-100">
									<img src="{{asset('storage/uploads/' . $product['image'])}}" alt="">
									<div class="card-body">
										<h6 class="card-title">{{$product['name']}}</h6>
									</div>
									<a href="/moreinfo/{{$product['id']}}" class="btn btn-info">More Info</a>
								</div>
							</div>
							@endforeach
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
@stop