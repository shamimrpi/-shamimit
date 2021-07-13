@extends('main.main')
@section('body_content')


    <!-- Main content -->
    <section class="content">
        <div class="container">
          <h2>Edit Post</h2>
          @if(session('message'))
    
                    <div class="alert alert-info" role="alert">
                    {{session('message')}}
                    </div>
                        
             @endif
          <div class="row">
            <div class="col-md-8">
              <form action="{{route('posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" name="title" value="{{$post->title}}">
                </div>
                 <div class="form-group">
                  <label>Category</label>
                  <select name="cat_id" class="form-control">
                    <option value="-1">Select Category Name</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{ $category->name}}</option>
                    @endforeach
                  </select>
                </div>
                 <div class="form-group">
                  <label>Category</label>
                  <select name="tag_id[]" id="tag_id"  class="form-control" multiple="">
                    <option value="-1">Select Tag Name</option>
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Thumnail</label>
                  <input type="file" name="thumbnail" class="form-control">
                </div>
                <div class="form-group">
                  <label>Body</label>
                  <textarea id="body" name="body" class="form-control" rows="10" >{{$post->body}}</textarea>
                </div>
                <button type="submit" class="btn btn-success"> Post</button>
              </form>
            </div>
          </div>
        </div>
    </section>

@endsection