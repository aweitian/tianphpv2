<?php
/**
 * Date: May 9, 2016
 * Author: Awei.tian
 * Description: 
 */
$info = $userInfo;

//PMCAI_MSG_CNF_ACTION_DEFAULT

function css_active_action($match_link,$links){
	$css = " class=\"active\"";
	$url = privController::$msg->getPmcaiUrl()->getUrl();
	$mca = explode("?", $url);
	$mca = substr($mca[0],5);
	return $match_link == $mca ? $css : "";
}

// var_dump(privController::$msg->getPmcaiUrl());
// exit(privController::$msg->getPmcaiUrl()->getUrl());

function css_active_control($links){
	$css = " active";
	$url = privController::$msg->getPmcaiUrl()->getUrl();
	$mca = explode("?", $url);
	$mca = substr($mca[0],5);
	return array_key_exists($mca, $links) ? $css : "";

}

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
            <?php $links = array(
            		"/disease/import"=>"病种导入",
            		"/disease"=>"病种管理",
            		"/symptom/import"=>"症状导入",
            		"/symptom"=>"症状管理"
            		
            )?>
            <li class="treeview<?php print css_active_control($links)?>">
              <a href="#">
                <i class="fa fa-database"></i> 
                <span>病种症状</span> 
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<?php foreach ($links as $link => $text):?>
              	<li<?php print css_active_action($link,$links)?>><a href="<?php print AppUrl::build("/priv".$link)?>"><i class="fa fa-circle-o"></i> <?php print $text?></a></li>
              	<?php endforeach;?>
              </ul>
            </li>
            <?php $links = array(
            		"/doctor/add"=>"添加医生",
            		"/doctor"=>"医生列表",
            		"/doctor/lv"=>"职位管理",
            		"/doctor/ext"=>"医生信息",
            		"/doctor/relarticle"=>"关联文章",
            		"/doctor/rellv"=>"设置职位",
            		"/doctor/revrellv"=>"修改职位",
            		"/appraise"=>"评价医生",
            		"/user/add"=>"添加水军",
            		"/user"=>"用户列表"
            		
            )?>
            <li class="treeview<?php print css_active_control($links)?>">
              <a href="#">
                <i class="fa  fa-user-md"></i>
                <span>医生/用户管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               	<?php foreach ($links as $link => $text):?>
              	<li<?php print css_active_action($link,$links)?>><a href="<?php print AppUrl::build("/priv".$link)?>"><i class="fa fa-circle-o"></i> <?php print $text?></a></li>
              	<?php endforeach;?>
              </ul>
            </li>
            <?php $links = array(
				"/article/add"=>"添加文章",
				"/article"=>"文章列表",
				"/article/comment"=>"文章评论",
				"/article/reldis"=>"未关联病种的文章",
				"/article/revreldis"=>"修改已关联的病种",
				"/article/reldoc"=>"未关联医生的文章",
				"/article/revreldoc"=>"修改已关联的医生",
				"/tags/add"=>"添加标签",
				"/tags"=>"标签管理"
            		
            )?>
            <li class="treeview<?php print css_active_control($links)?>">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>文章管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<?php foreach ($links as $link => $text):?>
              	<li<?php print css_active_action($link,$links)?>><a href="<?php print AppUrl::build("/priv".$link)?>"><i class="fa fa-circle-o"></i> <?php print $text?></a></li>
              	<?php endforeach;?>
              </ul>
            </li>
             <?php $links = array(
				"/ask/usr"=>"选择用户提问",
				"/ask/usrec"=>"用户提问记录",
				"/ask/doc"=>"医生的问题"
            		
            )?>
            <li class="treeview<?php print css_active_control($links)?>">
              <a href="#">
                <i class="fa fa-question"></i>
                <span>问答模块</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php foreach ($links as $link => $text):?>
              	<li<?php print css_active_action($link,$links)?>><a href="<?php print AppUrl::build("/priv".$link)?>"><i class="fa fa-circle-o"></i> <?php print $text?></a></li>
              	<?php endforeach;?>
              </ul>
            </li>
            <?php $links = array(
				"/present/add"=>"添加礼物",
				"/present"=>"礼物列表",
				"/letter/add"=>"添加感谢信",
				"/letter"=>"感谢信列表",
            )?>
            
            <li class="treeview<?php print css_active_control($links)?>">
              <a href="#">
                <i class="fa fa-gift"></i>
                <span>礼物感谢信</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<?php foreach ($links as $link => $text):?>
              	<li<?php print css_active_action($link,$links)?>><a href="<?php print AppUrl::build("/priv".$link)?>"><i class="fa fa-circle-o"></i> <?php print $text?></a></li>
              	<?php endforeach;?>  
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>