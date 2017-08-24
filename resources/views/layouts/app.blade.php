<!DOCTYPE html>
<html lang="en">

<head>
        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- BEGIN META -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="your,keywords">
        <meta name="description" content="Short explanation about this website">
        <!-- END META -->

        <!-- BEGIN STYLESHEETS -->
        <!--<link href="/css/app.css" rel="stylesheet">-->
        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <link type="text/css" rel="stylesheet" href="/css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="/css/materialadmin.css" />
        <link type="text/css" rel="stylesheet" href="/css/font-awesome.css" />
        <link type="text/css" rel="stylesheet" href="/css/font-awesome.min.css" />
        <link type="text/css" rel="stylesheet" href="/css/material-design-iconic-font.css" />
        <link type="text/css" rel="stylesheet" href="/css/libs/DataTables/jquery.dataTablesdee9.css?1422823365" />
        <link type="text/css" rel="stylesheet" href="/css/libs/DataTables/extensions/dataTables.colVis941e.css?1422823421" />
        <link type="text/css" rel="stylesheet" href="/css/libs/DataTables/extensions/dataTables.tableTools4029.css?1422823422" />

        <link type="text/css" rel="stylesheet" href="../../assets/css/modules/materialadmin/css/theme-default/libs/rickshaw/rickshawd56b.css?1422823372" />

        <link type="text/css" rel="stylesheet" href="../../assets/css/modules/materialadmin/css/theme-default/libs/morris/morris.core5e0a.css?1422823370" />

        <link rel="stylesheet" type="text/css" href="/js/sweetalert/sweetalert.css">

        <!-- END STYLESHEETS -->

        <!-- BEGIN JAVASCRIPT -->
            
        <script src="/js/modules/materialadmin/libs/jquery/jquery-1.11.2.min.js"></script>
        <script src="/js/modules/materialadmin/libs/bootstrap/bootstrap.min.js"></script>
        <script src="/js/modules/materialadmin/libs/spin.js/spin.min.js"></script>
        <script src="/js/modules/materialadmin/libs/autosize/jquery.autosize.min.js"></script>
        <script src="/js/modules/materialadmin/libs/moment/moment.min.js"></script>
        <script src="/js/core/cache/ec2c8835c9f9fbb7b8cd36464b491e73.js"></script>
        <script src="/js/modules/materialadmin/libs/jquery-knob/jquery.knob.min.js"></script>
        <script src="/js/modules/materialadmin/libs/sparkline/jquery.sparkline.min.js"></script>
        <script src="/js/modules/materialadmin/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
        <script src="/js/modules/materialadmin/core/cache/43ef607ee92d94826432d1d6f09372e1.js"></script>
        <script src="/js/modules/materialadmin/libs/rickshaw/rickshaw.min.js"></script>
        <script src="/js/modules/materialadmin/core/cache/63d0445130d69b2868a8d28c93309746.js"></script>
        <script src="/js/modules/materialadmin/core/demo/Demo.js"></script>
        <!-- <script src="/js/modules/materialadmin/core/demo/DemoDashboard.js"></script> -->
        <!-- <script src="/js/modules/materialadmin/core/demo/DemoTableDynamic.js"></script> -->
        <script src="/js/modules/materialadmin/libs/datatable/media/js/jquery.dataTables.min.js"></script>
        <script src="/js/modules/materialadmin/libs/datatable/media/js/dataTables.bootstrap4.min.js"></script>
        <script src="/js/sweetalert/sweetalert.min.js"></script>

        <!-- END JAVASCRIPT -->


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
    <script type="text/javascript" src="http://www.codecovers.eu/assets/js/modules/materialadmin/libs/utils/html5shiv.js?1422823601"></script>
    <script type="text/javascript" src="http://www.codecovers.eu/assets/js/modules/materialadmin/libs/utils/respond.min.js?1422823601"></script>
    <![endif]-->
    </head>

    <body class="menubar-hoverable header-fixed ">
    
    <!-- BEGIN HEADER-->

    <header id="header" >
        <div class="headerbar">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="headerbar-left">
                <ul class="header-nav header-nav-options">
                    <li class="header-nav-brand" >
                        <div class="brand-holder">
                            <a href="dashboard.html">
                                <span class="text-lg text-bold text-primary">EDIFICIOS ADMIN</span>
                            </a>
                        </div>
                    </li>
                    <li>
                        <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="headerbar-right">
                <ul class="header-nav header-nav-options">
                    <li>
                        <!-- Search form -->
                        <form class="navbar-search" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
                            </div>
                            <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                        </form>
                    </li>
                    <li class="dropdown hidden-xs">
                        <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                            <i class="fa fa-bell"></i><sup class="badge style-danger">4</sup>
                        </a>
                        <ul class="dropdown-menu animation-expand">
                            <li class="dropdown-header">Today's messages</li>
                            <li>
                                <a class="alert alert-callout alert-warning" href="javascript:void(0);">
                                    <img class="pull-right img-circle dropdown-avatar" src="" alt="" />
                                    <strong>Alex Anistor</strong><br/>
                                    <small>Testing functionality...</small>
                                </a>
                            </li>
                            <li>
                                <a class="alert alert-callout alert-info" href="javascript:void(0);">
                                    <img class="pull-right img-circle dropdown-avatar" src="" alt="" />
                                    <strong>Alicia Adell</strong><br/>
                                    <small>Reviewing last changes...</small>
                                </a>
                            </li>
                            <li class="dropdown-header">Options</li>
                            <li><a href="../pages/login.html">View all messages <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                            <li><a href="../pages/login.html">Mark as read <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                        </ul><!--end .dropdown-menu -->
                    </li><!--end .dropdown -->
                    <li class="dropdown hidden-xs">
                        <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                            <i class="fa fa-area-chart"></i>
                        </a>
                        <ul class="dropdown-menu animation-expand">
                            <li class="dropdown-header">Server load</li>
                            <li class="dropdown-progress">
                                <a href="javascript:void(0);">
                                    <div class="dropdown-label">
                                        <span class="text-light">Server load <strong>Today</strong></span>
                                        <strong class="pull-right">93%</strong>
                                    </div>
                                    <div class="progress"><div class="progress-bar progress-bar-danger" style="width: 93%"></div></div>
                                </a>
                            </li><!--end .dropdown-progress -->
                            <li class="dropdown-progress">
                                <a href="javascript:void(0);">
                                    <div class="dropdown-label">
                                        <span class="text-light">Server load <strong>Yesterday</strong></span>
                                        <strong class="pull-right">30%</strong>
                                    </div>
                                    <div class="progress"><div class="progress-bar progress-bar-success" style="width: 30%"></div></div>
                                </a>
                            </li><!--end .dropdown-progress -->
                            <li class="dropdown-progress">
                                <a href="javascript:void(0);">
                                    <div class="dropdown-label">
                                        <span class="text-light">Server load <strong>Lastweek</strong></span>
                                        <strong class="pull-right">74%</strong>
                                    </div>
                                    <div class="progress"><div class="progress-bar progress-bar-warning" style="width: 74%"></div></div>
                                </a>
                            </li><!--end .dropdown-progress -->
                        </ul><!--end .dropdown-menu -->
                    </li><!--end .dropdown -->
                </ul><!--end .header-nav-options -->
                <ul class="header-nav header-nav-profile">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                            <img src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="" />
                            <span class="profile-info">
                                {{ Auth::user()->name }}
                                <small>{{ Auth::user()->getPermisos() }}</small>
                            </span>
                        </a>
                        <ul class="dropdown-menu animation-dock">
                            <li class="dropdown-header">Config</li>
                            <li><a href="../pages/profile.html">Mi perfil</a></li>
                            <li><a href="../pages/blog/post.html"><span class="badge style-danger pull-right">16</span>My blog</a></li>
                            <li><a href="../pages/calendar.html">My appointments</a></li>
                            <li class="divider"></li>
                            <li><a href="../pages/locked.html"><i class="fa fa-fw fa-lock"></i> Lock</a></li>
                            <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul><!--end .dropdown-menu -->
                    </li><!--end .dropdown -->
                </ul><!--end .header-nav-profile -->
                <ul class="header-nav header-nav-toggle">
                    <li>
                        <a class="btn btn-icon-toggle btn-default" href="#offcanvas-search" data-toggle="offcanvas" data-backdrop="false">
                            <i class="fa fa-ellipsis-v"></i>
                        </a>
                    </li>
                </ul><!--end .header-nav-toggle -->
            </div><!--end #header-navbar-collapse -->
        </div>
    </header>

    <!-- END HEADER-->

    <!-- BEGIN BASE-->
    <div id="base">
        <!-- BEGIN OFFCANVAS LEFT -->
        <div class="offcanvas">
        </div><!--end .offcanvas-->
        <!-- END OFFCANVAS LEFT -->

        <!-- BEGIN CONTENT-->

        @yield('content')

        <!-- END CONTENT -->

        <!-- BEGIN MENUBAR-->
        <div id="menubar" class="menubar-inverse ">
            <div class="menubar-fixed-panel">
                <div>
                    <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="expanded">
                    <a href="dashboard.html">
                        <span class="text-lg text-bold text-primary ">MATERIAL&nbsp;ADMIN</span>
                    </a>
                </div>
            </div>
            <div class="menubar-scroll-panel">
                
        <!-- BEGIN MAIN MENU -->

        <ul id="main-menu" class="gui-controls">
            <!-- BEGIN DASHBOARD -->
            <li>
                <a href="{{ url('/home') }}" class="active">
                    <div class="gui-icon"><i class="md md-home"></i></div>
                    <span class="title">Dashboard</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END DASHBOARD -->
            
            <!-- BEGIN USUARIOS -->
            <li>
                <a href="{{ url('/usuarios') }}">
                    <div class="gui-icon"><i class="fa fa-users"></i></div>
                    <span class="title">Usuarios</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END USUARIOS -->

            <!-- BEGIN COMUNIDADES -->
            <li>
                <a href="{{ url('/comunidades') }}">
                    <div class="gui-icon"><i class="fa fa-building-o"></i></div>
                    <span class="title">Comunidades</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END COMUNIDADES -->

            <!-- BEGIN GASTO COMUN -->
            <li class="gui-folder">
                <a>
                    <div class="gui-icon"><i class="fa fa-money"></i></div>
                    <span class="title">Gastos Comunes</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="{{ url('/gastocomun') }}" ><span class="title">Ver Gastos Comunes</span></a></li>

                    <li><a href="{{ url('/gastocomun/add') }}" ><span class="title">Agregar Gasto Común</span></a></li>


                </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END GASTO COMUN -->

            <!-- BEGIN GASTO COMUN -->
            <li class="gui-folder">
                <a>
                    <div class="gui-icon"><i class="fa fa-flash"></i></div>
                    <span class="title">Consumo Energético</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="{{ url('/consumo') }}" ><span class="title">Ver Consumo energético</span></a></li>

                    <li><a href="{{ url('/consumo/add') }}" ><span class="title">Agregar Consumo energético</span></a></li>


                </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END GASTO COMUN -->
                
        </ul><!--end .main-menu -->

        <!-- END MAIN MENU -->

                <div class="menubar-foot-panel">
                    <small class="no-linebreak hidden-folded">
                        <span class="opacity-75">Copyright &copy; 2014</span> <strong>CodeCovers</strong>
                    </small>
                </div>
            </div><!--end .menubar-scroll-panel-->
        </div><!--end #menubar-->
        <!-- END MENUBAR -->

        <!-- BEGIN OFFCANVAS RIGHT -->
        <div class="offcanvas">
            


        <!-- BEGIN OFFCANVAS SEARCH -->
        <div id="offcanvas-search" class="offcanvas-pane width-8">
            <div class="offcanvas-head">
                <header class="text-primary">Search</header>
                <div class="offcanvas-tools">
                    <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                        <i class="md md-close"></i>
                    </a>
                </div>
            </div>

            <div class="offcanvas-body no-padding">
                <ul class="list ">
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>A</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="" alt="" />
                            </div>
                            <div class="tile-text">
                                Alex Nelson
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="" alt="" />
                            </div>
                            <div class="tile-text">
                                Ann Laurens
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>J</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="" alt="" />
                            </div>
                            <div class="tile-text">
                                Jessica Cruise
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="" alt="" />
                            </div>
                            <div class="tile-text">
                                Jim Peters
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>M</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="" alt="" />
                            </div>
                            <div class="tile-text">
                                Mabel Logan
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="" alt="" />
                            </div>
                            <div class="tile-text">
                                Mary Peterson
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="" alt="" />
                            </div>
                            <div class="tile-text">
                                Mike Alba
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>N</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="" alt="" />
                            </div>
                            <div class="tile-text">
                                Nathan Peterson
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>P</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="" alt="" />
                            </div>
                            <div class="tile-text">
                                Philip Ericsson
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>S</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
                            <div class="tile-icon">
                                <img src="" alt="" />
                            </div>
                            <div class="tile-text">
                                Samuel Parsons
                                <small>123-123-3210</small>
                            </div>
                        </a>
                    </li>
                </ul>
            </div><!--end .offcanvas-body -->
        </div><!--end .offcanvas-pane -->
        <!-- END OFFCANVAS SEARCH -->

            


        <!-- BEGIN OFFCANVAS CHAT -->
        <div id="offcanvas-chat" class="offcanvas-pane style-default-light width-12">
            <div class="offcanvas-head style-default-bright">
                <header class="text-primary">Chat with Ann Laurens</header>
                <div class="offcanvas-tools">
                    <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                        <i class="md md-close"></i>
                    </a>
                    <a class="btn btn-icon-toggle btn-default-light pull-right" href="#offcanvas-search" data-toggle="offcanvas" data-backdrop="false">
                        <i class="md md-arrow-back"></i>
                    </a>
                </div>
                <form class="form">
                    <div class="form-group floating-label">
                        <textarea name="sidebarChatMessage" id="sidebarChatMessage" class="form-control autosize" rows="1"></textarea>
                        <label for="sidebarChatMessage">Leave a message</label>
                    </div>
                </form>
            </div>

            <div class="offcanvas-body">
                <ul class="list-chats">
                    <li>
                        <div class="chat">
                            <div class="chat-avatar"><img class="img-circle" src="" alt="" /></div>
                            <div class="chat-body">
                                Yes, it is indeed very beautiful.
                                <small>10:03 pm</small>
                            </div>
                        </div><!--end .chat -->
                    </li>
                    <li class="chat-left">
                        <div class="chat">
                            <div class="chat-avatar"><img class="img-circle" src="" alt="" /></div>
                            <div class="chat-body">
                                Did you see the changes?
                                <small>10:02 pm</small>
                            </div>
                        </div><!--end .chat -->
                    </li>
                    <li>
                        <div class="chat">
                            <div class="chat-avatar"><img class="img-circle" src="" alt="" /></div>
                            <div class="chat-body">
                                I just arrived at work, it was quite busy.
                                <small>06:44pm</small>
                            </div>
                            <div class="chat-body">
                                I will take look in a minute.
                                <small>06:45pm</small>
                            </div>
                        </div><!--end .chat -->
                    </li>
                    <li class="chat-left">
                        <div class="chat">
                            <div class="chat-avatar"><img class="img-circle" src="" alt="" /></div>
                            <div class="chat-body">
                                The colors are much better now.
                            </div>
                            <div class="chat-body">
                                The colors are brighter than before.
                                I have already sent an example.
                                This will make it look sharper.
                                <small>Mon</small>
                            </div>
                        </div><!--end .chat -->
                    </li>
                    <li>
                        <div class="chat">
                            <div class="chat-avatar"><img class="img-circle" src="" alt="" /></div>
                            <div class="chat-body">
                                Are the colors of the logo already adapted?
                                <small>Last week</small>
                            </div>
                        </div><!--end .chat -->
                    </li>
                </ul>
            </div><!--end .offcanvas-body -->
        </div><!--end .offcanvas-pane -->
        <!-- END OFFCANVAS CHAT -->

                    </div><!--end .offcanvas-->
        <!-- END OFFCANVAS RIGHT -->

    </div><!--end #base-->  
    <!-- END BASE -->

    </body>

    <!-- FUNCIÓN PARA JSONIFICAR UN FORMULARIO -->
    <script type="text/javascript">
        function getFormData($form){
            var unindexed_array = $form.serializeArray();
            var indexed_array = {};

            $.map(unindexed_array, function(n, i){
                indexed_array[n['name']] = n['value'];
            });

            return indexed_array;
        }
    </script>
</html>