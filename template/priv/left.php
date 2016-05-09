<?php
/**
 * Date: May 9, 2016
 * Author: Awei.tian
 * Description: 
 */
$info = $userInfo;
?>
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php print HTTP_ENTRY?>/static/AdminLTE-2.3.0/img/user1-128x128.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php print $info["email"]?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">主控制面板</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-medkit"></i> <span>病种管理</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> 添加病种</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o"></i> 病种列表</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-plus-square"></i>
                <span>医生管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> 添加医生</a></li>
                <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> 医生列表</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user-md"></i>
                <span>后台用户</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> 添加用户</a></li>
                <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> 用户列表</a></li>
              </ul>
            </li>
           
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>