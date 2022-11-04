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
        <div class="container-fluid page-body-wrapper">
         <div class="main-panel">
            <div class="content-wrapper">                    
                <div class="row">  
                    <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">All Orders</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone.</th>
                                                <th>Address</th>
                                                <th>Foodname</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $data)
                                                <tr>
                                                    <td>{{$data->name}}</td>
                                                    <td>{{$data->phone}}</td>
                                                    <td>{{$data->address}}</td>
                                                    <td>{{$data->foodname}}</td>
                                                    <td>{{$data->price}}$</td>
                                                    <td>{{$data->quantity}}</td>
                                                    <td>{{$data->price * $data->quantity}}$</td>
                                                    <td>
                                                        <button type="submit" class="btn btn-success">Done</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                        <button type="submit" class="btn btn-warning">Update</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                           </div>
                    </div>
                </div>
            </div>
        </div>
    </div>              
</div>
</div>   
    <!-- plugins:js -->
      @include("admin.adminscript")
</body>
</html>