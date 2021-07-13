@extends('main.main')
@section('body_content')


    <!-- Main content -->
    <section class="content">
        <div class="container">

          <h2>Create New User</h2>
          
          <div class="row">
             <div class="col-md-3"></div>
              <div class="col-md-6">
                 @if(session('message'))
    
                    <div class="alert alert-info" role="alert">
                    {{session('message')}}
                    </div>
                        
                 @endif
                <form action="{{route('create.users.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="form-group">
                  <label>User Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter Your Name" value="{{old('name')}}">
                   @if($errors->has('name'))
                         <span class="invalid_feedback" role="alert">
                         <strong style="color:red">{{$errors->first('name')}}</strong>
                        </span>
                      @endif
                </div>

                 <div class="form-group">
                  <label>User Mail</label>
                  <input type="text" name="email" class="form-control" placeholder="Enter Your Name" value="{{old('name')}}">
                   @if($errors->has('email'))
                         <span class="invalid_feedback" role="alert">
                         <strong style="color:red">{{$errors->first('email')}}</strong>
                        </span>
                       @endif
                   </div>

                 <div class="form-group">
                  <label>User Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Enter Your Password" value="{{old('password')}}">
                   @if($errors->has('password'))
                         <span class="invalid_feedback" role="alert">
                         <strong style="color:red">{{$errors->first('password')}}</strong>
                        </span>
                        @endif
                </div>

                <div class="form-group">
                  <label>User Photo</label>
                  <input type="file" name="photo" class="form-control" value="{{old('photo')}}">
                   @if($errors->has('photo'))
                         <span class="invalid_feedback" role="alert">
                         <strong style="color:red">{{$errors->first('photo')}}</strong>
                        </span>
                        @endif
                </div>

                 <div class="form-group">
                  <label>Phone</label>
                  <input type="number" name="phone" class="form-control" value="Phone Number">
                   @if($errors->has('phone'))
                         <span class="invalid_feedback" role="alert">
                         <strong style="color:red">{{$errors->first('phone')}}</strong>
                        </span>
                        @endif
                </div>

                   <div class="form-group">
                  <label>Father Name</label>
                  <input type="text" name="f_name" class="form-control" value="mother name">
                   @if($errors->has('photo'))
                         <span class="invalid_feedback" role="alert">
                         <strong style="color:red">{{$errors->first('f_name')}}</strong>
                        </span>
                        @endif
                </div>

                <div class="form-group">
                  <label>Mother Name</label>
                  <input type="text" name="m_name" class="form-control" value="mother name">
                   @if($errors->has('m_name'))
                         <span class="invalid_feedback" role="alert">
                         <strong style="color:red">{{$errors->first('m_name')}}</strong>
                        </span>
                        @endif
                </div>

                  <div class="form-group">
                  <label>Experience</label>
                  <input type="text" name="experience" class="form-control" value="experience">
                   @if($errors->has('experience'))
                         <span class="invalid_feedback" role="alert">
                         <strong style="color:red">{{$errors->first('experience')}}</strong>
                        </span>
                        @endif
                </div>
                 <div class="form-group">
                  <label>SKill</label>
                  <input type="text" name="experience" class="form-control" value="skill">
                   @if($errors->has('skill'))
                         <span class="invalid_feedback" role="alert">
                         <strong style="color:red">{{$errors->first('skill')}}</strong>
                        </span>
                        @endif
                </div>

                 <div class="form-group">
                  <label>Education</label>
                  <input type="text" name="education" class="form-control" value="Education">
                   @if($errors->has('education'))
                         <span class="invalid_feedback" role="alert">
                         <strong style="color:red">{{$errors->first('education')}}</strong>
                        </span>
                        @endif
                </div>

                 <div class="form-group">
                  <label>Location</label>
                  <input type="text" name="location" class="form-control" value="location">
                   @if($errors->has('location'))
                         <span class="invalid_feedback" role="alert">
                         <strong style="color:red">{{$errors->first('location')}}</strong>
                        </span>
                        @endif
                </div>

                <div class="form-group">
                  <label>Note</label>
                  <input type="text" name="note" class="form-control" value="note">
                   @if($errors->has('note'))
                         <span class="invalid_feedback" role="alert">
                         <strong style="color:red">{{$errors->first('note')}}</strong>
                        </span>
                        @endif
                </div>



                
              
                   <input type="submit"  class="btn btn-info">

                </div>
                </form>
              </div>
          </div>
         
        </div>
    </section>

@endsection