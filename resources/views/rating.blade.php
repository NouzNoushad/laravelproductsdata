@extends('layout')

@section('content')
	<div class="container">
		<div class="row my-5">
			<div class="col-md-6 m-auto">
				<div class="card card-body">
					<form action="/rating" method="POST">
						@csrf
						<div class="row justify-content-center my-5">
							<input type="hidden" name="id" value={{$product['id']}}>
							<div class="col-sm-10 mt-2">
								@if($errors->has('username'))
									<input type="text" name="username" class="form-control border-danger" placeholder="Username">
									<small class="text-danger">@error('username'){{$message}}@enderror</small>
								@else
									<input type="text" name="username" class="form-control" placeholder="Username" value={{old('username')}}>
								@endif
							</div>
							<div class="col-sm-10 mt-2">
								@if($errors->has('rating'))
									<input type="text" name="rating" class="form-control border-danger" placeholder="Rating [0-5]" value={{old('rating')}}>
									<small class="text-danger">@error('rating'){{$message}}@enderror</small>
								@else
									<input type="text" name="rating" class="form-control" placeholder="Rating [0-5]" value={{old('rating')}}>
								@endif
							</div>
							<div class="col-sm-10 mt-2">
								@if($errors->has('review'))
									<textarea name="review" class="form-control border-danger" placeholder="Write your Review...">{{old('review')}}</textarea>
									<small class="text-danger">@error('review'){{$message}}@enderror</small>
								@else
									<textarea name="review" class="form-control" placeholder="Write your Review...">{{old('review')}}</textarea>
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