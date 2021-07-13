@extends('main.main')
@section('body_content')


    <!-- Main content -->
    <section class="content">
        <div class="container">

          <h2>Create Your Message</h2>
          
          <div class="row">
             <div class="col-md-3"></div>
              <div class="col-md-6">
                 @if(session('message'))
    
                    <div class="alert alert-info" role="alert">
                    {{session('message')}}
                    </div>
                        
                 @endif
                <form action="{{route('sms.store')}}" method="POST">
                  @csrf
                <div class="form-group">
                  <label>Your Subject</label>
                  <input type="text" name="subject" class="form-control" placeholder="Enter Your Message" value="{{old('subject')}}">
                </div>

                <div class="form-group">
                  <label>TO</label>
                  <select name="sent_to_id" class="form-control">
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                  </select>
                     
                </div>
                <div class="form-group">
                  <label>Message</label>
                  
                    <textarea class="form-control" name="body" placeholder="Enter Your Message" cols="16" rows="15"></textarea>
                  </div>
                   <button type="submit" class="btn btn-info">Send</button>  

                </div>
                </form>
              </div>
          </div>
         
        </div>
    </section>

@endsection