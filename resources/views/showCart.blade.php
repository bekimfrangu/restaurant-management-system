<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                           	
                   
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>
                       
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li> 
                           <li class="scroll-to-section" style="background:red;color:black">
                               @auth
                                 <a href="{{url('/showCart', Auth::user()->id)}}">
                                    Cart[{{$count}}]
                                 </a>  
                                @endauth
                            </li>  

                          <li>
                              @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                    <li>    
                                        <x-app-layout>

                                         </x-app-layout>
                                    </li> 
                                    @else
                                      <li>  <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li> 

                                        @if (Route::has('register'))
                                        <li>       <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li> 
                                        @endif
                                    @endauth
                                </div>
                             @endif
                          </li>
                       
                        </ul>        
                      
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div id="top">
         @if(Session::has('successOrderConfirm'))
                <div class="alert alert-success">
                    {{Session::get('successOrderConfirm')}}
                </div>
         @endif 
      <table class="table text-center mt-5 ml-10" style="width: 70%;">
            <thead class="thead-light">
                <tr>
                <th scope="col">Image</th>
                <th scope="col">Food</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Action</th>
                </tr>
            </thead>

            <form action="{{url('orderConfirm')}}" method="post">
                @csrf
                <tbody>
                    @foreach($data as $data)
                        <tr>
                        <td><img src="foodImage/{{$data->image}}" width="100" height="100" alt="" style=" display: block;margin-left: auto;margin-right: auto;"></td>
                        
                        <td>
                            <input type="text" name="foodname[]" value="{{$data->title}}" hidden>
                            {{$data->title}}
                        </td>
                        <td>
                          <input type="text" name="price[]" value="{{$data->price}}" hidden>
                            {{$data->price}}$
                        </td>
                        <td>
                           <input type="text" name="quantity[]" value="{{$data->quantity}}" hidden>
                            {{$data->quantity}}
                        </td>
                        </tr>
                    
                @endforeach
                @foreach($data2 as $data2)
                        <tr style="position:relative;top:-60px;right:-850px;">
                        <td> <a href="{{url('/remove',$data2->id)}}" onclick="return confirm('Are you sure?')" > <button type="button" class="btn btn-default btn-sm">
                            <i class="fa fa-times" aria-hidden="true"></i>
                                </button></a></td>
                        </tr>
                @endforeach
                </tbody>
                </table>

                @if($count > 0)

                <div align="center" style="padding:10px;">
                    <button class="btn btn-primary" type="button" id="order">Order Now</button>
                </div>
                @endif
                <div id="appear" class="container" style="display:none;width:500px">
                    
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <button type="submit" class="btn btn-success">Order Confrim</button>
                        <button type="button" id="close" class="btn btn-danger">Close</button>
                
                </div>
            </form>
            
            

   </div>
       

   <script type="text/javascript">
        $("#order").click(
                function() {
                    $("#appear").show();
                }
        );
        $("#close").click(
                function() {
                    $("#appear").hide();
                }
        );
   </script>
      <!-- jQuery -->
      <script src="assets/js/jquery-2.1.0.min.js"></script>

        <!-- Bootstrap -->
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- Plugins -->
        <script src="assets/js/owl-carousel.js"></script>
        <script src="assets/js/accordions.js"></script>
        <script src="assets/js/datepicker.js"></script>
        <script src="assets/js/scrollreveal.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>
        <script src="assets/js/imgfix.min.js"></script> 
        <script src="assets/js/slick.js"></script> 
        <script src="assets/js/lightbox.js"></script> 
        <script src="assets/js/isotope.js"></script> 

        <!-- Global Init -->
        <script src="assets/js/custom.js"></script>
        <script>

            $(function() {
                var selectedClass = "";
                $("p").click(function(){
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                    $("#portfolio div").not("."+selectedClass).fadeOut();
                setTimeout(function() {
                $("."+selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
                }, 500);
                    
                });
            });

        </script>
</body>
</html>