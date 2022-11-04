<x-app-layout>
   
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
      @include("admin.admincss")
  </head>
  <body>
  <div class="container-scroller">
        @include("admin.navbar")
        <div style="position:relative; top:60px; right:-70px;color:white; width:20%">
            @if(Session::has('successEditRes'))
                <div class="alert alert-info">
                    {{Session::get('successEditRes')}}
                </div>
            @endif
            @if(Session::has('errorEditRes'))
                <div class="alert alert-warning">
                    {{Session::get('errorEditRes')}}
                </div>
            @endif
             <form method="post" enctype="multipart/form-data" action="{{url('/updateReservation', $data->id)}}">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$data->name}}"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{$data->email}}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{$data->phone}}">
                </div>
                <div class="form-group">
                    <label for="guest">Guests</label>
                    <input type="number" class="form-control" name="guest" id="guest" value="{{$data->guest}}">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="text" class="form-control" name="date" id="date" value="{{$data->date}}">
                </div>
                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="text" class="form-control" name="time" id="time" value="{{$data->time}}">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="10" rows="10" class="form-control">{{$data->message}}</textarea>
                </div>
            
                <button type="submit" class="btn btn-m btn-primary">Edit</button>
            </form>
        </div>
  </div>     
    <!-- plugins:js -->
      @include("admin.adminscript")
 
  </body>
</html>