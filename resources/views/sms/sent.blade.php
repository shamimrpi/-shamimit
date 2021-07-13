@extends('main.main')
@section('body_content')


    <!-- Main content -->
    <section class="content">
        <div class="container">
          <h2>Your Sent Message</h2>
          <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>To</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th width="120">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($sms as $key=>$s)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$s->receiver->name}}</td>
                  <td>{{$s->subject}}</td>
                  <td>{{$s->body}}</td>
                  <td width="120" align="center">
                    <form action="{{route('sms.destroy',$s->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                    <a href="" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                   
                    <button class="btn btn-danger fa fa-trash"></button>
                     </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                 <tr>
                  <th>SL</th>
                  <th>From</th>
                  <th>Subjec</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </tfoot>
          </table>
        </div>
    </section>

@endsection