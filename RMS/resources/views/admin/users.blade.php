 <x-app-layout>
   
</x-app-layout>
   
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include("admin.admincss")
    </head>
     <body>
        <div class="container-scroller">
        
            @include("admin.navbar")
           <div style="position:relative; top:60px; right:-60px; width:100%">
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

               <table class="table">
                   <tr>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Role</th>
                       <th>Action</th>
                   </tr>

                   @foreach($data as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>
                            @if($data->usertype =='1')
                                Admin
                            @else
                                User
                            @endif
                        </td>
                        @if($data->usertype == 0)
                            <td><a href="{{url('/deleteUser', $data->id)}}" class="btn btn-sm btn-danger">Delete</a></td>
                        @else
                             <td><a href="" class="btn btn-sm btn-info">Not Allowed</a></td>
                        @endif        
                    </tr>
                   @endforeach
               </table>
           </div>
            <!-- plugins:js -->
            @include("admin.adminscript")
        </div>
    </body>
</html>