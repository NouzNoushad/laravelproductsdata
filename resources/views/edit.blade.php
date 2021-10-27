@extends('layout')

@section('content')
	<div class="container">
		<div class="row my-5">
			<div class="col-md-7 m-auto">
				<div class="card card-body">
					<form action="/edit" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row justify-content-center my-5">
							<div class="col-sm-10 text-center">
								<img src="{{asset('storage/uploads/' . $product['image'])}}" alt="" height=300>
							</div>
							<input type="hidden" name="id" value={{$product['id']}}>
							<div class="col-sm-10 mt-3">
								@if($errors->has('file'))
									<input type="file" name="file" class="form-control border-danger">
									<small class="text-danger">@error('file'){{$message}}@enderror</small>
								@else
									<input type="file" name="file" class="form-control">
								@endif
							</div>
							<div class="col-sm-10 mt-2">
								@if($errors->has('name'))
									<input type="name" name="name" class="form-control border-danger" placeholder="Name">
									<small class="text-danger">@error('name'){{$message}}@enderror</small>
								@else
									<input type="name" name="name" class="form-control" placeholder="Name" value={{$product['name']}}>
								@endif
							</div>
							<div class="col-sm-10 mt-2">
								@if($errors->has('type'))
									<input type="type" name="type" class="form-control border-danger" placeholder="Type">
									<small class="text-danger">@error('type'){{$message}}@enderror</small>
								@else
									<input type="type" name="type" class="form-control" placeholder="Type" value={{$product['type']}}>
								@endif
							</div>
							<div class="col-sm-10 mt-2">
								@if($errors->has('brand'))
									<input type="brand" name="brand" class="form-control border-danger" placeholder="Brand">
									<small class="text-danger">@error('brand'){{$message}}@enderror</small>
								@else
									<input type="brand" name="brand" class="form-control" placeholder="Brand" value={{$product['brand']}}>
								@endif
							</div>
							<div class="col-sm-10 mt-2">
								@if($errors->has('price'))
									<input type="price" name="price" class="form-control border-danger" placeholder="Price">
									<small class="text-danger">@error('price'){{$message}}@enderror</small>
								@else
									<input type="price" name="price" class="form-control" placeholder="Price" value={{$product['price']}}>
								@endif
							</div>
							<div class="col-sm-10 mt-3">
								<button type="submit" name="submit" class="btn btn-primary form-control">Edit Data</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop