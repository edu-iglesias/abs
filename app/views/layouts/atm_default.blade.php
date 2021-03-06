<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Automated Banking System</title>
        {{ HTML::style('css/font-awesome.css') }}
        {{ HTML::style('css/bootstrap.css') }}
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/bootstrap-theme.min.css') }}
        {{ HTML::style('css/sb-admin.css') }}

        {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}
        {{ HTML::style('colvix/css/jquery.dataTables.css')}}
        {{ HTML::style('colvix/css/dataTables.colVis.css')}}
        {{ HTML::style('colvix/css/shCore.css')}}
        
        {{ HTML::script('colvix/js/jquery.js')}}
        {{ HTML::script('colvix/js/jquery.dataTables.js')}}
        {{ HTML::script('colvix/js/dataTables.colVis.js')}}
        {{ HTML::script('colvix/js/shCore.js')}}
        {{ HTML::script('colvix/js/demo.js')}}


        <script type="text/javascript" language="javascript" class="init">
            $(document).ready(function() {
                $('#colvixTable').DataTable( {
                    dom: 'C<"clear">lfrtip'
                } );
            } );
        </script>

        {{ HTML::style('css/custom.css') }}
    
        @yield('header')
    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- div for header with title -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/" style="color:#008cba;">{{ HTML::image('images/logo2.png',"",['height'=>'25px', 'width'=>'25px']) }} Web Synergy Bank</font></a>
                </div>

                <!-- div for side and top menu -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <!-- Side Menu -->
                    <ul class="nav navbar-nav side-nav">
                        <li class="">
                            <a href="/atm/profile" style="border-bottom: solid 1px rgba(0, 0, 0, 0.2);"><i class="fa fa-user"></i></i> Profile Information</a>
                        </li>
                        <li class="">
                            <a href="/atm/deposit/{id}" style="border-bottom: solid 1px rgba(0, 0, 0, 0.2);"><i class="fa fa-share"></i></i></i></i></i> Deposit</a>
                        </li>
                        <li class="">
                            <a href="/atm/withdraw/{id}" style="border-bottom: solid 1px rgba(0, 0, 0, 0.2);"><i class="fa fa-reply"></i></i></i></i></i></i> Withdraw</a>
                        </li>
                        <li class="">
                            <a href="/atm/transfer/{id}" style="border-bottom: solid 1px rgba(0, 0, 0, 0.2);"><i class="fa fa-reply-all"></i></i></i></i> Transfer Account</a>
                        </li>
                        <li class="">
                            <a href="/atm/passbook" style="border-bottom: solid 1px rgba(0, 0, 0, 0.2);"><i class="fa fa-clipboard"></i></i></i> View Pass Book</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i> {{ Session::get('admin_firstname') . " " . Session::get('admin_lastname') }}  <b class="caret" style="margin-top: 0;"></b>
                            </a>



                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/logout"><i class="fa fa-sign-out"></i></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            @yield('content')
                        </div>
                    </div>
                </div>

                <br/>

                <div class="container no-print" style="width: 100%">
                    <br>
                    <p class="text-muted" style="text-align: center; font-size: 11px;">Developed by 
                        <a href="#" title="#">Web Synergy 2.0</a><br/>
                        Powered by <a href="http://laravel.com/" style="color: #f47063">Laravel</a>.
                    </p>
                </div>
            </div>
        </div>

        <!-- JavaScript -->

        <script type="text/javascript">  
            $(document).ready(function () {  
                $('.dropdown-toggle').dropdown();  
            });  
       </script>  

       {{ HTML::script('js/bootstrap.min.js') }}

       @yield('footer')

    </body>
</html>