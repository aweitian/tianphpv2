<?php
/**
 * Date: May 9, 2016
 * Author: Awei.tian
 * Description: 
 */
//$auth = new priv($session);

$uidata = $auth->getUiData();
?>
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php print HTTP_ENTRY?>"><b>Admin</b>LTE</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?php print HTTP_ENTRY?>/priv/login" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
          	<?php if(array_key_exists("Verification code", $uidata)):?>
          <div class="col-xs-8">
              <input type="text" name="code" class="form-control" placeholder="Verification code">
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          <?php else:/*不需要验证码*/?>
          <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          
          <?php endif;?>
            
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php print HTTP_ENTRY?>/static/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php print HTTP_ENTRY?>/static/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php print HTTP_ENTRY?>/static/plugins/iCheck/icheck.min.js"></script>
