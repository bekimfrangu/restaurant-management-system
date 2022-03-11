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
        <div style="position:relative; top:60px; right:-60pxl;color:white">
            @if(Session::has('successEditFood'))
                <div class="alert alert-info">
                    {{Session::get('successEditFood')}}
                </div>
            @endif
            @if(Session::has('errorEditFood'))
                <div class="alert alert-warning">
                    {{Session::get('errorEditFood')}}
                </div>
            @endif
             <form method="post" enctype="multipart/form-data" action="{{url('/updateFood', $data->id)}}">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{$data->title}}"/>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" id="price" value="{{$data->price}}">
                </div>
              
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="title" class="form-control" name="description" id="description" value="{{$data->description}}">
                </div>
                <div class="form-group">
                    <label>Old Image</label>
                    <img height="130" width="130" src="/foodImage/{{$data->image}}">
                </div>
                  <div class="form-group">
                    <label for="image">New Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
  </div>     
    <!-- plugins:js -->
      @include("admin.adminscript")
 
  </body>
</html>