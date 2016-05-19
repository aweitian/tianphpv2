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
              <img src="<?php print HTTP_ENTRY?>/static/bower_components/AdminLTE/dist/img/user1-128x128.jpg" class="img-circle" alt="User Image">
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
                <i class="fa fa-stethoscope"></i> <span>病种管理</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?php print HTTP_ENTRY?>/priv/disease/import"><i class="fa fa-circle-o"></i> 批量导入</a></li>
                <li><a href="<?php print HTTP_ENTRY?>/priv/disease"><i class="fa fa-circle-o"></i> 病种列表</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-plus-square"></i>
                <span>医生管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php print HTTP_ENTRY?>/priv/doctor/lv"><i class="fa fa-circle-o"></i> 职位管理</a></li>
                <li><a href="<?php print HTTP_ENTRY?>/priv/doctor"><i class="fa fa-circle-o"></i> 医生列表</a></li>
                <li><a href="<?php print HTTP_ENTRY?>/priv/doctor/relartical"><i class="fa fa-circle-o"></i> 关联文章</a></li>
                <li><a href="<?php print HTTP_ENTRY?>/priv/doctor/rellv"><i class="fa fa-circle-o"></i> 关联职位</a></li>
                <li><a href="<?php print HTTP_ENTRY?>/priv/doctor/manwealth"><i class="fa fa-circle-o"></i> 赠送设置</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user-md"></i>
                <span>注册用户</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<li><a href="<?php print HTTP_ENTRY?>/priv/user/add"><i class="fa fa-circle-o"></i> 添加用户</a></li>
                <li><a href="<?php print HTTP_ENTRY?>/priv/user"><i class="fa fa-circle-o"></i> 用户列表</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>文章管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<li><a href="<?php print HTTP_ENTRY?>/priv/artical/add"><i class="fa fa-circle-o"></i> 添加文章</a></li>
              	<li><a href="<?php print HTTP_ENTRY?>/priv/artical"><i class="fa fa-circle-o"></i> 文章列表</a></li>
                <li><a href="<?php print HTTP_ENTRY?>/priv/artical/reldis"><i class="fa fa-circle-o"></i> 关联病种</a></li>
                <li><a href="<?php print HTTP_ENTRY?>/priv/artical/revreldis"><i class="fa fa-circle-o"></i> 修改已关联的病种</a></li>
                <li><a href="<?php print HTTP_ENTRY?>/priv/artical/reldoc"><i class="fa fa-circle-o"></i> 关联医生</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-gift"></i>
                <span>心意礼物</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php print HTTP_ENTRY?>/priv/present/add"><i class="fa fa-circle-o"></i> 添加用户</a></li>
                <li><a href="<?php print HTTP_ENTRY?>/priv/present"><i class="fa fa-circle-o"></i> 礼物列表</a></li>
              </ul>
            </li>
           
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>