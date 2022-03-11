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
            @if(Session::has('successEditChef'))
                <div class="alert alert-info">
                    {{Session::get('successEditChef')}}
                </div>
            @endif
            @if(Session::has('errorEditChef'))
                <div class="alert alert-warning">
                    {{Session::get('errorEditChef')}}
                </div>
            @endif
             <form method="post" enctype="multipart/form-data" action="{{url('/updateFoodChef', $data->id)}}">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$data->name}}"/>
                </div>
                <div class="form-group">
                    <label for="specialty">Speciality</label>
                    <input type="text" class="form-control" name="specialty" id="specialty" value="{{$data->specialty}}">
                </div>
                <div class="form-group">
                    <label>Old Image</label>
                    <img height="130" width="130" src="/chefsImage/{{$data->image}}">
                </div>
                  <div class="form-group">
                    <label for="image">New Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
            
                <button type="submit" class="btn btn-m btn-primary">Edit</button>
            </form>
        </div>
  </div>     
    <!-- plugins:js -->
      @include("admin.adminscript")
 
  </body>
</html>