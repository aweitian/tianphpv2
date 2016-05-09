<?php
/**
 * Date: May 9, 2016
 * Author: Awei.tian
 * Description: 
 */
?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<?php include dirname(__FILE__)."/header.php"?>
      
		<!-- Left side column. contains the logo and sidebar -->
      	<?php include dirname(__FILE__)."/left.php"?>

		<!-- Content Wrapper. Contains page content -->
      	<?php include dirname(__FILE__)."/right.php"?>


      	<!-- Control Sidebar -->
      	<?php include dirname(__FILE__)."/ControlSidebar.php"?>
      	
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <?php include dirname(__FILE__)."/footer.js.php"?>
  </body>