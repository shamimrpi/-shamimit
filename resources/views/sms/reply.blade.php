@extends('main.main')
@section('body_content')


    <!-- Main content -->
    <section class="content">
        <div class="container">

          <h2>Create Your Message</h2>
          
          <div class="row justify-content-md-center">
            <div class="col-md-3"></div>
              <div class="col-md-6">
                 @if(session('message'))
    
                    <div class="alert alert-info" role="alert">
                    {{session('message')}}
                    </div>
                        
             @endif
                <form action="{{route('sms.reply.store',$s->id)}}" method="POST">
                  @csrf
                <div class="form-group">
                  <label>Your Subject</label>
                  <input type="text" name="subject" class="form-control"  value="Re:{{$s->subject}}">
                </div>

                <div class="form-group">
                  <label>TO</label>
                  <select name="sent_to_id" class="form-control">
                
                    <option value="{{$s->sender_id}}">{{$s->sender->name}}</option>
                  
                  </select>
                     
                </div>
                <div class="form-group">
                  <label>Message</label>
                  
                    <textarea class="form-control" name="body"  cols="16" rows="15">{{$s->body}}</textarea>
                  </div>
                   <input type="submit" class="btn btn-info">

                </div>
                </form>
              </div>
          </div>
         
        </div>
    </section>

@endsection