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
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <title>Offgamers</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.css') }} " rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('assets/css/colors/blue.css') }} " id="theme" rel="stylesheet">

    <!-- Sweet Alert 2 Js -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/css/sweetalert2.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/css/sweetalert2.min.css') }} ">


    <!-- Select 2 --> 
    <link href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }} " rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.css') }} " rel="stylesheet" /> 
    <link href="{{ asset('assets/plugins/multiselect/css/multi-select.css') }} " rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
      .textarealah{  
        display: block;
        box-sizing: padding-box;
        overflow: hidden;
        resize: vertical;
        padding: 5px 8px;
        font-size: 11px;
        border-radius: 0;
        border: 1px solid #ccc;
        width:100%;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        min-height: 30px;
      }  

      .loader {
            position:fixed;
            z-index: 99;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            opacity:0.8;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader > img {
            width: 100px;
        }

        .loader.hidden {
            animation: fadeOut 1s;
            animation-fill-mode: forwards;
        }

        @keyframes fadeOut {
            100% {
                opacity: 0;
                visibility: hidden;
            }
        }

        html {
            -webkit-font-smoothing: antialiased!important;
            -moz-osx-font-smoothing: grayscale!important;
            -ms-font-smoothing: antialiased!important;
        }
        body {
        font-family: 'Open Sans', sans-serif;
        font-size:16px;
        color:#555555; 
        }
        .md-stepper-horizontal {
            display:table;
            width:100%;
            margin:0 auto;
            background-color:#FFFFFF;
            box-shadow: 0 3px 8px -6px rgba(0,0,0,.50);
        }
        .md-stepper-horizontal .md-step {
            display:table-cell;
            position:relative;
            padding:24px;
        }
        .md-stepper-horizontal .md-step:hover,
        .md-stepper-horizontal .md-step:active {
            background-color:rgba(0,0,0,0.04);
        }
        .md-stepper-horizontal .md-step:active {
            border-radius: 15% / 75%;
        }
        .md-stepper-horizontal .md-step:first-child:active {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
        .md-stepper-horizontal .md-step:last-child:active {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .md-stepper-horizontal .md-step:hover .md-step-circle {
            background-color:#757575;
        }
        .md-stepper-horizontal .md-step:first-child .md-step-bar-left,
        .md-stepper-horizontal .md-step:last-child .md-step-bar-right {
            display:none;
        }
        .md-stepper-horizontal .md-step .md-step-circle {
            width:30px;
            height:30px;
            margin:0 auto;
            background-color:#999999;
            border-radius: 50%;
            text-align: center;
            line-height:30px;
            font-size: 16px;
            font-weight: 600;
            color:#FFFFFF;
        }
        .md-stepper-horizontal.green .md-step.active .md-step-circle {
            background-color:#00AE4D;
        }
        .md-stepper-horizontal.orange .md-step.active .md-step-circle {
            background-color:#F96302;
        }
        .md-stepper-horizontal .md-step.active .md-step-circle {
            background-color: rgb(33,150,243);
        }
        .md-stepper-horizontal .md-step.done .md-step-circle:before {
            font-family:'FontAwesome';
            font-weight:100;
            content: "\f00c";
        }
        .md-stepper-horizontal .md-step.done .md-step-circle *,
        .md-stepper-horizontal .md-step.editable .md-step-circle * {
            display:none;
        }
        .md-stepper-horizontal .md-step.editable .md-step-circle {
            -moz-transform: scaleX(-1);
            -o-transform: scaleX(-1);
            -webkit-transform: scaleX(-1);
            transform: scaleX(-1);
        }
        .md-stepper-horizontal .md-step.editable .md-step-circle:before {
            font-family:'FontAwesome';
            font-weight:100;
            content: "\f040";
        }
        .md-stepper-horizontal .md-step .md-step-title {
            margin-top:16px;
            font-size:16px;
            font-weight:600;
        }
        .md-stepper-horizontal .md-step .md-step-title,
        .md-stepper-horizontal .md-step .md-step-optional {
            text-align: center;
            color:rgba(0,0,0,.26);
        }
        .md-stepper-horizontal .md-step.active .md-step-title {
            font-weight: 600;
            color:rgba(0,0,0,.87);
        }
        .md-stepper-horizontal .md-step.active.done .md-step-title,
        .md-stepper-horizontal .md-step.active.editable .md-step-title {
            font-weight:600;
        }
        .md-stepper-horizontal .md-step .md-step-optional {
            font-size:12px;
        }
        .md-stepper-horizontal .md-step.active .md-step-optional {
            color:rgba(0,0,0,.54);
        }
        .md-stepper-horizontal .md-step .md-step-bar-left,
        .md-stepper-horizontal .md-step .md-step-bar-right {
            position:absolute;
            top:36px;
            height:1px;
            border-top:1px solid #DDDDDD;
        }
        .md-stepper-horizontal .md-step .md-step-bar-right {
            right:0;
            left:50%;
            margin-left:20px;
        }
        .md-stepper-horizontal .md-step .md-step-bar-left {
            left:0;
            right:50%;
            margin-right:20px;
        } 
    </style>

    @yield('css')
</head>

<body class="fix-header fix-sidebar card-no-border">

    <div class="loader">
        <img src="{{ asset('assets/images/giphy.gif') }}" alt="loading.....">
    </div>

    <div id="loaderpage" class="loader" style='display: none;'>
        <img src="{{ asset('assets/images/giphy.gif') }}" alt="loading.....">
    </div>
    
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        
        
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{url('/home')}}">
                          <b>
                                
                            </b> 
                           <span>
                                
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse">
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav mr-auto mt-md-0">
                            <!-- This is  -->
                            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                            <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        </ul>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav my-lg-0">
                
                            <!-- ============================================================== -->
                            <!-- Profile -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown"> 
                                <div class="dropdown-menu dropdown-menu-right scale-up">
                                    <ul class="dropdown-user"> 
                                        <li role="separator" class="divider"></li> 
                                        <li><a href="javascript:void(0)"><i class="mdi mdi-account-box"></i> {{Session::get('name')}}</a></li>  
                                        <li><a href="javascript:void(0)"><i class="mdi mdi-email-variant"></i> <span style="font-size:12px;">{{Session::get('email')}} </span> </a></li> 
                                        <li role="separator" class="divider"></li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>
            </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->

        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    
                    <div class="user-profile"> 
                        <div class="profile-text">
                            Welcome
                            <h5>{{Session::get('name')}}</h5>        
                        </div>
                    </div> 

                    <!-- Sidebar navigation-->
                        <nav class="sidebar-nav">
                            <ul id="sidebarnav">
                                <li class="nav-devider"></li>
                                <li class="nav-small-cap">General</li>
                                
                                <li> 
                                    <a class="waves-effect waves-dark" href="{{url('/home')}}" aria-expanded="false">
                                    <i class="mdi mdi-home-variant"></i>
                                        <span class="hide-menu">Dashboard 
                                            <span class="label label-rouded label-success pull-right">Home</span>
                                        </span>
                                    </a> 
                                </li>   

                                <li> 
                                    <a class="waves-effect waves-dark" href="{{url('/rewards')}}" aria-expanded="false">
                                    <i class="mdi mdi-star"></i>
                                        <span class="hide-menu">Reward 
                                            <span class="label label-rouded label-warning pull-right">Point</span>
                                        </span>
                                    </a> 
                                </li>  
                                
                                <li> 
                                    <a class="waves-effect waves-dark" href="{{url('/payments')}}" aria-expanded="false">
                                    <i class="mdi mdi-cash-usd"></i>
                                        <span class="hide-menu">Payment 
                                            <span class="label label-rouded label-danger pull-right">List</span>
                                        </span>
                                    </a> 
                                </li>  

                                <li> 
                                    <a class="waves-effect waves-dark" href="{{url('/customers')}}" aria-expanded="false">
                                    <i class="mdi mdi-account-box"></i>
                                        <span class="hide-menu">Customer 
                                            <span class="label label-rouded label-default pull-right">User</span>
                                        </span>
                                    </a> 
                                </li>  

                                <li> 
                                    <a class="waves-effect waves-dark" href="{{url('/exchanges')}}" aria-expanded="false">
                                    <i class="mdi mdi-stackexchange"></i>
                                        <span class="hide-menu">Exchanges 
                                            <span class="label label-rouded label-info pull-right">Rate</span>
                                        </span>
                                    </a> 
                                </li>  

                                <li> 
                                    <form id="form_logout" action="{{url('/logout/post')}}" method="post">
                                        @csrf
                                    </form>

                                    <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false" onclick="document.getElementById('form_logout').submit();">
                                    <i class="mdi mdi-logout-variant"></i>
                                        <span class="hide-menu">Logout  
                                        </span>
                                    </a> 
                                </li> 
                            </ul>
                        </nav>
                    <!-- End Sidebar navigation -->

                </div>
                <!-- End Sidebar scroll-->
            </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->


        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            
            @yield('content')

            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid"> 
                
               

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © <?php echo date('Y'); ?> Offgamers</footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
   
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }} "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }} "></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }} "></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }} "></script>
    <!--Wave Effects -->
    <script src="{{ asset('assets/js/waves.js') }} "></script>
    <!--Menu sidebar -->
    <script src="{{ asset('assets/js/sidebarmenu.js') }} "></script>
    <!--stickey kit -->
    <script src="{{ asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }} "></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('assets/js/custom.min.js') }} "></script>
    <!-- ============================================================== -->
    
    <!-- Select 2 -->
    <script src="{{ asset('assets/plugins/select2/dist/js/select2.full.min.js') }} " type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.js') }} " type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/multiselect/js/jquery.multi-select.js') }} "></script>

    <!-- Sweet Alert 2 Js -->
    <script src="{{ asset('assets/plugins/sweetalert2/js/sweetalert2.js') }} "></script>
    <script src="{{ asset('assets/plugins/sweetalert2/js/sweetalert2.min.js') }} "></script>


    <!-- Style switcher --> 
    <script src="{{ asset('assets/plugins/styleswitcher/jQuery.style.switcher.js') }} "></script>
    <script src="{{ asset('assets/plugins/switchery/dist/switchery.min.js') }} "></script>
                                    

    <script>
        
        // Loader
            window.addEventListener("load", function(){
                const loader = document.querySelector(".loader");
                loader.className += " hidden";
            });
        // Loader

        // Uppercase
            function upperCaseF(a){
                setTimeout(function(){
                    a.value = a.value.toUpperCase();
                }, 1);
            }
        // Uppercase

        
        $(document).ready(function(){
            $(".select2").select2();

            $(".input_number_text").keypress(function(event){
                var ew = event.which;
                if(48 <= ew && ew <= 57)
                    return true;
                if(65 <= ew && ew <= 90)
                    return true;
                if(97 <= ew && ew <= 122)
                    return true;
                return false;
            });
            
            $(".input_number").on("keypress keyup blur",function (event) {    
            $(this).val($(this).val().replace(/[^\d].+/, ""));
                if ((event.which < 48 || event.which > 57)) {
                    event.preventDefault();
                }
            }); 
        });

    </script>

    @yield('js')

</body>
</html>

