<?php
/**
 * Date: Apr 12, 2016
 * Author: Awei.tian
 * Description: 
 */
?>
<div class="container">

      <form class="login-form" method="post" action="<?php print $submit_url?>">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input name="usr" type="text" class="form-control" placeholder="Username" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input name="pwd" type="password" class="form-control" placeholder="Password">
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        </div>
      </form>

</div>