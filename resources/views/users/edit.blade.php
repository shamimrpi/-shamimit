@extends('main.main')
@section('body_content')
<div class="box">
	<div class="box-body">
		<div class="container">
			<div class="row">
				<div class="col-md-2">

				</div>
				<div class="col-md-8">
					<form action="{{route('pass.store')}}" method="POST">
						@csrf
						@method('PUT')
					<div class="form-group">
						<label> New Password</label>
						<input type="password" name="password" class="form-control" placeholder="Enter New Password"> 

						
					</div>

					<div class="form-group">
						<label> Confirm Password</label>
						<input type="password" name="confirmed" class="form-control" placeholder="Enter confirmed Password"> 

						
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