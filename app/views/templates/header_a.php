<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta charset="utf-8" />
  <title><?= $data['title']; ?></title>

  <meta name="description" content="overview &amp; stats" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

  <!-- bootstrap & fontawesome -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/ui.jqgrid.min.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/jquery-ui.min.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/fonts.googleapis.com.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/ace-skins.min.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/ace-rtl.min.css" />
  <script src="<?= BASEURL; ?>/assets/js/ace-extra.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

<script src="http://jeromeetienne.github.io/jquery-qrcode/src/jquery.qrcode.js"></script>
<script src="http://jeromeetienne.github.io/jquery-qrcode/src/qrcode.js"></script>
</head>

<body class="skin-1">
  <div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
      <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
        <span class="sr-only">Toggle sidebar</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>
      </button>

      <div class="navbar-header pull-left">
        <a href="<?= BASEURL; ?>" class="navbar-brand">
          <small>
            <!-- <i class="fa fa-leaf"></i> -->
            IT Asset Management
          </small>
        </a>
      </div>

      <div class="navbar-buttons navbar-header pull-right" role="navigation">
        <ul class="nav ace-nav">
          <li class="light-blue dropdown-modal">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
              <!-- <img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="Jason's Photo" /> -->
              <span class="user-info">
                <small>Welcome,</small>
                <?= $_SESSION['usr']['user']; ?>
              </span>

              <i class="ace-icon fa fa-caret-down"></i>
            </a>

            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
              <li>
                <a href="#">
                  <i class="ace-icon fa fa-cog"></i>
                  Settings
                </a>
              </li>

              <li>
                <a href="profile.html">
                  <i class="ace-icon fa fa-user"></i>
                  Profile
                </a>
              </li>

              <li class="divider"></li>

              <li>
                <a href="<?= BASEURL; ?>/home/logout">
                  <i class="ace-icon fa fa-power-off"></i>
                  Logout
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div><!-- /.navbar-container -->
  </div>

  <div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
      try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
      <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
      </script>

      <ul class="nav nav-list">

        <li class="active">
          <a href="<?= BASEURL; ?>">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Home </span>
          </a>

          <b class="arrow"></b>
        </li>
        <li class="">
          <a href="#">
            <!-- <i class="menu-icon fa fa-pencil-square-o"></i> -->
            <span class="menu-text"> Master Data </span>
          </a>
          <li class="">
            <a href="<?= BASEURL; ?>/assetkat">
              <i class="menu-icon fa fa-caret-right"></i>
              Asset Category
            </a>
          </li>
          <li class="">
            <a href="<?= BASEURL ?>/department">
              <i class="menu-icon fa fa-caret-right"></i>
              Department
            </a>
            <b class="arrow"></b>
          </li>
          <li class="">
            <a href="<?= BASEURL ?>/employee">
              <i class="menu-icon fa fa-caret-right"></i>
              Personal Data
            </a>
            <b class="arrow"></b>
          </li>
          <li class="">
            <a href="<?= BASEURL ?>/employee/emp_dept">
              <i class="menu-icon fa fa-caret-right"></i>
              Dept Assignment
            </a>
            <b class="arrow"></b>
          </li>
        </li>

        <li class="">
          <a href="<?= BASEURL; ?>/policy">
            <i class="menu-icon fa fa-caret-right"></i>
            <span class="menu-text">
              IT Policy Master
            </span>
          </a>
        </li>

        <li class="">
          <a href="<?= BASEURL; ?>/location">
            <i class="menu-icon fa fa-caret-right"></i>
            <span class="menu-text">
              Asset Location
            </span>
          </a>
        </li>

        <li class="">
          <a href="<?= BASEURL; ?>/unit">
            <i class="menu-icon fa fa-caret-right"></i>
            <span class="menu-text">
              Asset Unit
            </span>
          </a>
        </li>

        <li class="">
          <a href="#" class="dropdown-toggle">
            <span class="menu-text">
              Transaction
            </span>
            <b class="arrow fa fa-angle-down"></b>
          </a>

          <ul class="submenu">
            <li class="">
              <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-caret-right"></i>
                Asset
                <b class="arrow fa fa-angle-down"></b>
              </a>

              <b class="arrow"></b>

              <ul class="submenu">
                <li class="">
                  <a href="<?= BASEURL; ?>/asset">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Create Asset
                  </a>
                  <b class="arrow"></b>
                </li>

                <li class="">
                  <a href="<?= BASEURL; ?>/asset/change">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Change Asset
                  </a>
                  <b class="arrow"></b>
                </li>

                <li class="">
                  <a href="<?= BASEURL; ?>/asset/display">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Display Asset
                  </a>
                  <b class="arrow"></b>
                </li>
              </ul>
            </li>

            <li class="">
              <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-caret-right"></i>
                IT-Policy
                <b class="arrow fa fa-angle-down"></b>
              </a>

              <b class="arrow"></b>

              <ul class="submenu">
                <li class="">
                  <a href="top-menu.html">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Create IT Policy
                  </a>
                  <b class="arrow"></b>
                </li>

                <li class="">
                  <a href="two-menu-1.html">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Change IT Policy
                  </a>
                  <b class="arrow"></b>
                </li>

                <li class="">
                  <a href="two-menu-1.html">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Display IT Policy
                  </a>
                  <b class="arrow"></b>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="">
          <a href="#">
            <i class="menu-icon fa fa-tasks"></i>
            Reports
          </a>
          <b class="arrow"></b>
        </li>
        
        <li class="">
          <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-gear"></i>
            <span class="menu-text">
              Configuration
            </span>
            <b class="arrow fa fa-angle-down"></b>
          </a>

          <ul class="submenu">
            <li class="">
              <a href="<?= BASEURL; ?>/user">
                <i class="menu-icon fa fa-caret-right"></i>
                User Access
              </a>
            </li>
          </ul>
        </li>
      </ul><!-- /.nav-list -->

      <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
      </div>
    </div>

    <div class="main-content">
      <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
          <ul class="breadcrumb">
            <li>
              <i class="ace-icon fa fa-home home-icon"></i>
              <a href="<?= BASEURL; ?>">Home</a>
            </li>
            <li class="active">Dashboard</li>
          </ul><!-- /.breadcrumb -->

          <div class="nav-search" id="nav-search">
            <form class="form-search">
              <span class="input-icon">
                <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                <i class="ace-icon fa fa-search nav-search-icon"></i>
              </span>
            </form>
          </div><!-- /.nav-search -->
        </div>

        <div class="page-content">
          <div class="ace-settings-container" id="ace-settings-container">
            <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
              <i class="ace-icon fa fa-cog bigger-130"></i>
            </div>

            <div class="ace-settings-box clearfix" id="ace-settings-box">
              <div class="pull-left width-50">
                <div class="ace-settings-item">
                  <div class="pull-left">
                    <select id="skin-colorpicker" class="hide">
                      <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                      <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                      <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                      <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                    </select>
                  </div>
                  <span>&nbsp; Choose Skin</span>
                </div>

                <div class="ace-settings-item">
                  <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
                  <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                </div>

                <div class="ace-settings-item">
                  <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
                  <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                </div>

                <div class="ace-settings-item">
                  <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
                  <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                </div>

              </div>

            </div><!-- /.ace-settings-box -->
          </div><!-- /.ace-settings-container -->

          <div class="page-header">
            <h1>
              <?= $data['menu']; ?>
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?= $data['menu-dsc']; ?>
              </small>
            </h1>
          </div><!-- /.page-header -->

          <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT START -->