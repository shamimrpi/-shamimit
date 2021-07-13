@extends('main.main')
@section('body_content')


    <!-- Main content -->
    <section class="content">
        <div class="container">

          <h2>View Message</h2>
          
          <div class="row">
             <div class="col-md-3"></div>
              <div class="col-md-6">
               
                <div class="form-group">
                  <label>Your Subject</label>
                  <input type="text" disabled="" name="subject" class="form-control" value="{{$sms->subject}}">
                </div>

                <div class="form-group">
                  <label>From</label>
                  
                   {{$sms->sender->name}}
                 
                     
                </div>
                <div class="form-group">
                  <label>Message</label>
                  
                    <textarea class="form-control" name="body" placeholder="Enter Your Message" cols="16" rows="15" disabled="">{{$sms->body}}</textarea>
                  </div>
                   <button type="submit" class="btn btn-info">Send</button>  

                </div>
                </form>
              </div>
          </div>
         
        </div>
    </section>

@endsection