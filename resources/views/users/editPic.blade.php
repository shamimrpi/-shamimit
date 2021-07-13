@extends('main.main')
@section('body_content')
<div class="box">
	<div class="box-body">
		<div class="container">
			<div class="row">
				<div class="col-md-2">

				</div>
				<div class="col-md-8">
					<form action="{{route('update.pic')}}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
					<div class="form-group">
						<label> Photo</label>
						<input type="file" name="photo" class="form-control"> 

						
					</div>


					<button class="btn btn-info">Update</button>
					</form>
				</div>
				<div class="col-md-2">

				</div>
			</div>
		</div>
	</div>
</div>

@endsection