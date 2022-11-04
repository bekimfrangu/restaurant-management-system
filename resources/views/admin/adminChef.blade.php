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
            @if(Session::has('successUploadChef'))
                <div class="alert alert-info">
                    {{Session::get('successUploadChef')}}
                </div>
            @endif
            @if(Session::has('errorUploadChef'))
                <div class="alert alert-warning">
                    {{Session::get('errorUploadChef')}}
                </div>
            @endif
             <form method="post" enctype="multipart/form-data" action="{{url('uploadChef')}}">
                 @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <label for="specialty">Specialty</label>
                    <input type="text" class="form-control" name="specialty" id="specialty" placeholder="Give specialty" required>
                </div>
                 <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Add Chef</button>
            </form>
        </div>


        
        <div style="position:relative; top:60px; right:-100px;color:white;width:55%">
          @if(Session::has('successDeleteChef'))
                <div class="alert alert-info">
                    {{Session::get('successDeleteChef')}}
                </div>
            @endif
            @if(Session::has('errorDeleteChef'))
                <div class="alert alert-warning">
                    {{Session::get('errorDeleteChef')}}
                </div>
            @endif 
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Speciality</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $data)
                        <tr>
                        <th>{{$data->name}}</th>
                        <td>{{$data->specialty}}</td>
                        <td><img src="/chefsImage/{{$data->image}}" alt=""></td>
                        <td colspan="2">
                          <a href="{{url('deleteChef', $data->id)}}"><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button></a>
                          <a href="{{url('updateChef', $data->id)}}"><button class="btn btn-sm btn-warning">Update</button></a>
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