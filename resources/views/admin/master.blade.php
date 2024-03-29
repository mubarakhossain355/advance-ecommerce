<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/')}}admin/assets/images/favicon.png">
    <title>Khilji Shop Admin - @yield('title')</title>
    <!-- This page CSS -->
    @include('admin.includes.style')
    
</head>

<body class="skin-blue fixed-layout">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Khilji Shop admin</p>
        </div>
    </div>
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">
        
        <!-- Topbar header - style you can find in pages.scss -->
        @include('admin.includes.header')
        <!-- End Topbar header -->
        
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
       
        @include('admin.includes.sidebar')
     
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
       
        <!-- Page wrapper  -->
        <div class="page-wrapper">
           
            <!-- Container fluid  -->
             <div class="container-fluid">
             
               @yield('content')
               
               
            </div>
            <!-- End Container fluid  -->
        </div>
        <!-- End Page wrapper  -->

        <!-- footer -->
        @include('admin.includes.footer')
        <!-- End footer -->
    </div>
  
    <!-- End Wrapper -->
  
    <!-- All Jquery -->
   
   @include('admin.includes.script')
</body>

</html>