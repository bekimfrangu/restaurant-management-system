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
        <div style="position:relative; top:60px; right:-60px;color:white">
            @if(Session::has('success'))
                <div class="alert alert-info">
                    {{Session::get('success')}}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-warning">
                    {{Session::get('error')}}
                </div>
            @endif
             <form method="post" enctype="multipart/form-data" action="{{url('uploadFood')}}">
                 @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter food" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Give price" required>
                </div>
               
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" id="description" cols="5" rows="10" placeholder="Give a description" class="form-control"></textarea>
                </div>
                 <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Add food</button>
            </form>
        </div>


        
        <div style="position:relative; top:60px; right:-100px;color:white;width:55%">
          @if(Session::has('successDelete'))
                <div class="alert alert-info">
                    {{Session::get('successDelete')}}
                </div>
            @endif
            @if(Session::has('errorDelete'))
                <div class="alert alert-warning">
                    {{Session::get('errorDelete')}}
                </div>
            @endif 
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $data)
                        <tr>
                        <th>{{$data->title}}</th>
                        <td>{{$data->price}}$</td>
                        <td>{{$data->description}}</td>
                        <td><img src="/foodImage/{{$data->image}}" alt=""></td>
                        <td colspan="2">
                          <a href="{{url('deleteFood', $data->id)}}"><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button></a>
                          <a href="{{url('updateView', $data->id)}}"><button class="btn btn-sm btn-warning">Update</button></a>
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