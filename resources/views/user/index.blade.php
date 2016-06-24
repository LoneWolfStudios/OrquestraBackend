<!DOCTYPE html>
<html lang="en" ng-app="OrquestraUser">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 3.1
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
    ================================================================================ -->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
        <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
        <title>Orquestra - User</title>

        <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
        <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
        <meta name="msapplication-TileColor" content="#00bcd4">
        <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">


        <link href="<% $STATIC_URL %>/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="<% $STATIC_URL %>/css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="<% $STATIC_URL %>/css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">

        <link href="<% $STATIC_URL %>/js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="<% $STATIC_URL %>/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="<% $STATIC_URL %>/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    </head>

    <body>
        <input type="hidden" id="APP_URL" value="<% $APP_URL %>">

        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>

        <header id="header" class="page-topbar">
            <div class="navbar-fixed">
                <nav class="navbar-color">
                    <div class="nav-wrapper">
                        <ul class="left">
                            <li>
                                <h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1"><img src="<% $STATIC_URL %>/images/materialize-logo.png" alt="materialize logo"></a> <span class="logo-text">Materialize</span></h1></li>
                            </ul>
                            <div class="header-search-wrapper hide-on-med-and-down">
                                <i class="mdi-action-search"></i>
                                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize" />
                            </div>
                            <ul class="right hide-on-med-and-down">
                                <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button" data-activates="translation-dropdown"><img src="<% $STATIC_URL %>/images/flag-icons/United-States.png" alt="USA" /></a>
                                </li>
                                <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                                </li>
                                <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-social-notifications"><small class="notification-badge">5</small></i>

                                </a>
                            </li>
                            <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                            </li>
                        </ul>
                        <ul id="translation-dropdown" class="dropdown-content">
                            <li>
                                <a href="#!"><img src="<% $STATIC_URL %>/images/flag-icons/United-States.png" alt="English" />  <span class="language-select">English</span></a>
                            </li>
                            <li>
                                <a href="#!"><img src="<% $STATIC_URL %>/images/flag-icons/France.png" alt="French" />  <span class="language-select">French</span></a>
                            </li>
                            <li>
                                <a href="#!"><img src="<% $STATIC_URL %>/images/flag-icons/China.png" alt="Chinese" />  <span class="language-select">Chinese</span></a>
                            </li>
                            <li>
                                <a href="#!"><img src="<% $STATIC_URL %>/images/flag-icons/Germany.png" alt="German" />  <span class="language-select">German</span></a>
                            </li>

                        </ul>
                        <ul id="notifications-dropdown" class="dropdown-content">
                            <li>
                                <h5>NOTIFICATIONS <span class="new badge">5</span></h5>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#!"><i class="mdi-action-add-shopping-cart"></i> A new order has been placed!</a>
                                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                            </li>
                            <li>
                                <a href="#!"><i class="mdi-action-stars"></i> Completed the task</a>
                                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
                            </li>
                            <li>
                                <a href="#!"><i class="mdi-action-settings"></i> Settings updated</a>
                                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
                            </li>
                            <li>
                                <a href="#!"><i class="mdi-editor-insert-invitation"></i> Director meeting started</a>
                                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
                            </li>
                            <li>
                                <a href="#!"><i class="mdi-action-trending-up"></i> Generate monthly report</a>
                                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <div id="main">
            <div class="wrapper">

                <aside id="left-sidebar-nav" ng-controller="LeftNavbarCtrl">
                    <ul id="slide-out" class="side-nav fixed leftside-navigation">
                        <li class="user-details cyan darken-2">
                            <div class="row">
                                <div class="col col s4 m4 l4">
                                    <img src="<% $STATIC_URL %>/images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                                </div>
                                <div class="col col s8 m8 l8">
                                    <ul id="profile-dropdown" class="dropdown-content">
                                        <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                                        </li>
                                        <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                                        </li>
                                        <li><a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                        </li>
                                    </ul>
                                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">
                                        {{ user.name }}<i class="mdi-navigation-arrow-drop-down right"></i>
                                    </a>
                                    <p class="user-roal">Meu Perfil</p>
                                </div>
                            </div>
                        </li>
                        <li class="bold"><a ui-sref="home" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
                        </li>
                        <li class="no-padding">
                            <ul class="collapsible collapsible-accordion">

                                <li class="li-hover">
                                    <div class="divider"></div>
                                </li>

                                <li ng-repeat="device in devices" class="bold">
                                    <a ui-sref="device_detail({deviceId: {{device.id}} })" class="waves-effect waves-cyan">
                                        <i class="mdi-action-favorite"></i> {{ device.nickname }}
                                    </a>
                                </li>

                                <li class="li-hover" ng-if="devices.length == 0">
                                    <p class="ultra-small margin" style="padding-left: 5px;">Você ainda não possui dispositivos.</p>
                                </li>

                                <li class="li-hover">
                                    <div class="divider"></div>
                                </li>
                                
                                <li class="li-hover" >
                                    <a ui-sref="device_create" class="waves-effect waves-light white-text btn s6">Novo Dispositivo</a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
                </aside>

                <section id="content">

                    <div id="breadcrumbs-wrapper" ng-controller="BreadcumbCtrl">
                        <div class="header-search-wrapper grey hide-on-large-only">
                            <i class="mdi-action-search active"></i>
                            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <h5 class="breadcrumbs-title">{{ breadcumb.title }}</h5>
                                    <ol class="breadcrumbs">
                                        <li ng-repeat="b in breadcumb.items" ng-class="{active:$last}">
                                            <a ng-if="!$last" ui-sref="{{b.url}}">{{b.text}}</a>
                                            <span ng-if="$last">{{b.text}}</span>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="section" ui-view="MainContent"></div>
                    </div>
                </section>
                <aside id="right-sidebar-nav">
                    <ul id="chat-out" class="side-nav rightside-navigation">
                        <li class="li-hover">
                            <a href="#" data-activates="chat-out" class="chat-close-collapse right"><i class="mdi-navigation-close"></i></a>
                            <div id="right-search" class="row">
                                <form class="col s12">
                                    <div class="input-field">
                                        <i class="mdi-action-search prefix"></i>
                                        <input id="icon_prefix" type="text" class="validate">
                                        <label for="icon_prefix">Search</label>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="li-hover">
                            <ul class="chat-collapsible" data-collapsible="expandable">
                                <li>
                                    <div class="collapsible-header teal white-text active"><i class="mdi-social-whatshot"></i>Recent Activity</div>
                                    <div class="collapsible-body recent-activity">
                                        <div class="recent-activity-list chat-out-list row">
                                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-add-shopping-cart"></i>
                                            </div>
                                            <div class="col s9 recent-activity-list-text">
                                                <a href="#">just now</a>
                                                <p>Jim Doe Purchased new equipments for zonal office.</p>
                                            </div>
                                        </div>
                                        <div class="recent-activity-list chat-out-list row">
                                            <div class="col s3 recent-activity-list-icon"><i class="mdi-device-airplanemode-on"></i>
                                            </div>
                                            <div class="col s9 recent-activity-list-text">
                                                <a href="#">Yesterday</a>
                                                <p>Your Next flight for USA will be on 15th August 2015.</p>
                                            </div>
                                        </div>
                                        <div class="recent-activity-list chat-out-list row">
                                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                                            </div>
                                            <div class="col s9 recent-activity-list-text">
                                                <a href="#">5 Days Ago</a>
                                                <p>Natalya Parker Send you a voice mail for next conference.</p>
                                            </div>
                                        </div>
                                        <div class="recent-activity-list chat-out-list row">
                                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-store"></i>
                                            </div>
                                            <div class="col s9 recent-activity-list-text">
                                                <a href="#">Last Week</a>
                                                <p>Jessy Jay open a new store at S.G Road.</p>
                                            </div>
                                        </div>
                                        <div class="recent-activity-list chat-out-list row">
                                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                                            </div>
                                            <div class="col s9 recent-activity-list-text">
                                                <a href="#">5 Days Ago</a>
                                                <p>Natalya Parker Send you a voice mail for next conference.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-header light-blue white-text active"><i class="mdi-editor-attach-money"></i>Sales Repoart</div>
                                    <div class="collapsible-body sales-repoart">
                                        <div class="sales-repoart-list  chat-out-list row">
                                            <div class="col s8">Target Salse</div>
                                            <div class="col s4"><span id="sales-line-1"></span>
                                            </div>
                                        </div>
                                        <div class="sales-repoart-list chat-out-list row">
                                            <div class="col s8">Payment Due</div>
                                            <div class="col s4"><span id="sales-bar-1"></span>
                                            </div>
                                        </div>
                                        <div class="sales-repoart-list chat-out-list row">
                                            <div class="col s8">Total Delivery</div>
                                            <div class="col s4"><span id="sales-line-2"></span>
                                            </div>
                                        </div>
                                        <div class="sales-repoart-list chat-out-list row">
                                            <div class="col s8">Total Progress</div>
                                            <div class="col s4"><span id="sales-bar-2"></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-header red white-text"><i class="mdi-action-stars"></i>Favorite Associates</div>
                                    <div class="collapsible-body favorite-associates">
                                        <div class="favorite-associate-list chat-out-list row">
                                            <div class="col s4"><img src="<% $STATIC_URL %>/images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                                            </div>
                                            <div class="col s8">
                                                <p>Eileen Sideways</p>
                                                <p class="place">Los Angeles, CA</p>
                                            </div>
                                        </div>
                                        <div class="favorite-associate-list chat-out-list row">
                                            <div class="col s4"><img src="<% $STATIC_URL %>/images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                                            </div>
                                            <div class="col s8">
                                                <p>Zaham Sindil</p>
                                                <p class="place">San Francisco, CA</p>
                                            </div>
                                        </div>
                                        <div class="favorite-associate-list chat-out-list row">
                                            <div class="col s4"><img src="<% $STATIC_URL %>/images/avatar.jpg" alt="" class="circle responsive-img offline-user valign profile-image">
                                            </div>
                                            <div class="col s8">
                                                <p>Renov Leongal</p>
                                                <p class="place">Cebu City, Philippines</p>
                                            </div>
                                        </div>
                                        <div class="favorite-associate-list chat-out-list row">
                                            <div class="col s4"><img src="<% $STATIC_URL %>/images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                                            </div>
                                            <div class="col s8">
                                                <p>Weno Carasbong</p>
                                                <p>Tokyo, Japan</p>
                                            </div>
                                        </div>
                                        <div class="favorite-associate-list chat-out-list row">
                                            <div class="col s4"><img src="<% $STATIC_URL %>/images/avatar.jpg" alt="" class="circle responsive-img offline-user valign profile-image">
                                            </div>
                                            <div class="col s8">
                                                <p>Nusja Nawancali</p>
                                                <p class="place">Bangkok, Thailand</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </aside>

            </div>
        </div>

        <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="<% $STATIC_URL %>/js/materialize.min.js"></script>
    <!--prism
    <script type="text/javascript" src="<% $STATIC_URL %>/js/prism/prism.js"></script>-->
    <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins/chartist-js/chartist.min.js"></script>
    <script type="text/javascript" src="<% $STATIC_URL %>/js/plugins.min.js"></script>
    <script type="text/javascript" src="<% $STATIC_URL %>/js/custom-script.js"></script>
    <script type="text/javascript" src="<% $STATIC_URL %>/bower_components/underscore/underscore-min.js"></script>
    <script type="text/javascript" src="<% $STATIC_URL %>/bower_components/sparkline/dist/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="<% $STATIC_URL %>/bower_components/angular/angular.min.js"></script>
    <script type="text/javascript" src="<% $STATIC_URL %>/bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>


    <script type="text/javascript" src="<% $STATIC_URL %>/dist/0.0.1/orquestra.js"></script>

</body>

</html>