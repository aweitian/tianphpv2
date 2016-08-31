<?php
?>
<div class="dh_by"></div>
<div class="sjdxwz" style="cursor:pointer">
  <div class="dh_top"><img src="<?php print AppUrl::getMediaPath()?>/images/pop_1.jpg" class="fr" /></div>
    <form name="myform" action="http://swt.gssmart.com/send/index.php" method="POST">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px">
  
      <tr>
        <input type="hidden" name="content" value="上海九龙男子医院医师提醒：如有男科疾病方面的疑问，可拨打24小时咨询热线：021-52733999" />
        <td width="100" align="center">您的电话：</td>
        <td><input name="tel" type="text" id="ska_a" value="请输入您的电话号码，通话费用我们支付，请您放心接听！" onmouseover="this.focus()" onblur="if (this.value =='') this.value='请输入您的电话号码，通话费用我们支付，请您放心接听！'" onfocus="this.select()" onclick="if (this.value=='请输入您的电话号码，通话费用我们支付，请您放心接听！') this.value=''" style="width:360px"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="48"><img src="<?php print AppUrl::getMediaPath()?>/images/dh2.jpg" /> 我们对您本次通话全程加密！</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input name="submit" type="submit" value="给您回电" class="tsjy_but tsjy_but_in" id="senddx" onclick="a()">
          <input name="reset" type="reset" value="重新输入" class="tsjy_but tsjy_buts tsjy_but_in"></td>
      </tr>

  </table>
      </form>
</div>
<script src="<?php print AppUrl::getMediaPath()?>/js/dhuse.js"></script>