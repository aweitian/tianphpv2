<?php
/**
 * Date: May 9, 2016
 * Author: Awei.tian
 * Description: 
 */
$info = $userInfo;
?>
<header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php print HTTP_ENTRY?>/static/AdminLTE-2.3.0/img/user1-128x128.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php print $info["email"]?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php print HTTP_ENTRY?>/static/AdminLTE-2.3.0/img/user1-128x128.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php print $info["email"]?>
                      <small>Member since <?php print $info["time"]?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#"><?php print $info["privilege"]?></a>
                    </div>
                    <div class="col-xs-4 text-center">
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php print HTTP_ENTRY?>/priv/user/resetpwd" class="btn btn-default btn-flat">修改密码</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php print HTTP_ENTRY?>/priv/login/logout" class="btn btn-default btn-flat">退出</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>