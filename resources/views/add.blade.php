@extends('layout')

@section('content')
	<div class="container">
		<div class="row my-5">
			<div class="col-md-7 m-auto">
				<div class="card card-body">
					<form action="/add" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row justify-content-center my-5">
							<div class="col-sm-10">
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
									<input type="name" name="name" class="form-control" placeholder="Name" value={{old('name')}}>
								@endif
							</div>
							<div class="col-sm-10 mt-2">
								@if($errors->has('type'))
									<input type="type" name="type" class="form-control border-danger" placeholder="Type">
									<small class="text-danger">@error('type'){{$message}}@enderror</small>
								@else
									<input type="type" name="type" class="form-control" placeholder="Type" value={{old('type')}}>
								@endif
							</div>
							<div class="col-sm-10 mt-2">
								@if($errors->has('brand'))
									<input type="brand" name="brand" class="form-control border-danger" placeholder="Brand">
									<small class="text-danger">@error('brand'){{$message}}@enderror</small>
								@else
									<input type="brand" name="brand" class="form-control" placeholder="Brand" value={{old('brand')}}>
								@endif
							</div>
							<div class="col-sm-10 mt-2">
								@if($errors->has('price'))
									<input type="price" name="price" class="form-control border-danger" placeholder="Price">
									<small class="text-danger">@error('price'){{$message}}@enderror</small>
								@else
									<input type="price" name="price" class="form-control" placeholder="Price" value={{old('price')}}>
								@endif
							</div>
							<div class="col-sm-10 mt-3">
								<button type="submit" name="submit" class="btn btn-primary form-control">Add</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop