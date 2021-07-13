@extends('main.main')
@section('body_content')
<div class="box">
	<div class="box-body">
    <h2>All Users</h2>
		  <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  
                  <th>Name</th>
                  <th>email</th>
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  
                  @foreach($users as $key=>$user)
                  <?php 
                    

                  $friend = App\Friendship::where('sent_id',Auth::id())->where('accept_id',$user->id)->first();
                  $unfriend = $user->id == Auth::id();
                   ?>
                <tr>
                  <td>{{$key+1}}</td>
                  <td><a href="{{route('common.profile',$user->id)}}">{{$user->name}}</a>
                  </td>
                  <td>{{$user->email}}</td>
                  <td width="100"><img src="{{asset('users_photo/'.$user->photo)}}" height="50" width="50"> </td>
                   @foreach($friends as $f)
                   <td>
                    
                    <a href="@if($user->id == Auth::id())# @else {{route('friend.store',$user->id)}}@endif" class="btn btn-info">@if($friend) Unfollow @elseif($unfriend) You @else Follow @endif</a>
                   
                  </td>
                   @endforeach
                </tr>
                @endforeach
                
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
           </table>
	</div>
</div>

@endsection