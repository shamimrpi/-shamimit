@extends('main.main')
@section('body_content')
<section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive" src="{{ URL::to('/') }}/users_photo/{{ $user->photo }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{$user->name}}</h3>

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

                <?php 
                    

                  $friend = App\Friendship::where('sent_id',Auth::id())->where('accept_id',$user->id)->first();
                  $unfriend = $user->id == Auth::id();
                   ?>
              <a href="@if($user->id == Auth::id())# @else {{route('friend.store',$user->id)}}@endif" class="btn btn-primary btn-block">@if($friend) Unfollow @elseif($unfriend) You @else Follow @endif</a>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
               
                 {{$user->profile->education}}
              

              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">{{$user->profile->location}}</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
               
                {{$user->profile->skill}}
                
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>
               
                {{$user->profile->note}}</p>
               
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
           @if(session('message'))
               <div class="alert alert-info" role="alert">
                  {{session('message')}}
              </div>                  
          @endif
       
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#findfriend" data-toggle="tab">Find Friends</a></li>
               
              
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                @foreach($posts as $post)
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('users_photo/'.$post->user->photo)}}" alt="user image">
                        <span class="username">
                          <a href="#">{{$post->user->name}}</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>

                    <span class="description">Shared publicly - {{$post->updated_at->diffForHumans()}}</span>
                    <h3>{{$post->title}}</h3>
                  </div>
                   <div class="post-img" style="text-align: center;height: 100%;width:100%">
                    @if($post->thumbnail)
                    
                      <img src="{{asset('posts_images/'.$post->thumbnail)}}">
                    
                    @endif
                  </div>
                  <p>
                    {!!$post->body!!}
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="{{route('like.store',$post->id)}}" class="btn @if($post->likeByCurrentUser()) btn-danger @else btn-info @endif  text-sm"><i class="fa fa-thumbs-o-up margin-r-5 @if($post->likeByCurrentUser()) btn-danger @else btn-info @endif"></i>@if($post->likeByCurrentUser()) Liked @else Like @endif</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        {{$post->comments->count()}}</a></li>
                  </ul>
                  <form action="{{route('comment.store',$post->id)}}" method="POST">
                    @csrf
                      <input type="text" class="form-control input-sm" name="body" type="text" placeholder="Type a comment">
                      <br>
                      <input type="submit" class="btn btn-success" value="Comment">
                      <br>
                      <br>
                  </form>
                  @foreach($post->comments as $comment)
                  
                       <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{asset('users_photo/'.$comment->user->photo)}}" alt="user image">
                        <span class="username">
                          <a href="#">{{$comment->user->name}}</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">{{$comment->body}}- {{$post->created_at->diffForHumans()}}</span>
                  </div>
                    
                  @endforeach
                
                </div>
                @endforeach
                <!-- /.post -->

            
              </div>
              <!-- /.tab-pane -->
          <div class="tab-pane" id="findfriend">
                <!-- The timeline -->
          
             
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
              <!-- /.tab-pane -->

        <!-- /.col -->
      </div>

 
      <!-- /.row -->

    </section>

@endsection