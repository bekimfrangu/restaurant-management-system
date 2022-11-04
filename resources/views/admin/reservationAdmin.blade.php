<x-app-layout>
   
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
      @include("admin.admincss")
  </head>
  <body>
  <div class="container-scroller">
        @include("admin.navbar")
        <div style="position:relative; top:60px; right:-60px;color:white;  width:100%">
          @if(Session::has('successDeleteRes'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong> {{Session::get('successDeleteRes')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(Session::has('errorDeleteRes'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>  {{Session::get('errorDeleteRes')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif 
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Guests</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Message</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $data)
                        <tr>
                        <th>{{$data->name}}</th>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->guest}}</td>
                        <td>{{$data->date}}</td>
                        <td>{{$data->time}}</td>
                        <td>{{$data->message}}</td>
                       
                        <td colspan="2">
                          <a href="{{url('deleteReservation', $data->id)}}"><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button></a>
                          <a href="{{url('updateViewReservation', $data->id)}}"><button class="btn btn-sm btn-warning">Update</button></a>
                        </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
         </div>
   </div>   
    <!-- plugins:js -->
      @include("admin.adminscript")
  </body>
</html>