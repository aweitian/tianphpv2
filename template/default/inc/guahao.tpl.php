<?php
?>
<script src="<?php print AppUrl::getMediaPath()?>/js/guahao.js"></script>
      <div class="syrbox4 border2">
        <div class="syrboxtit fz18 graybg">预约挂号</div>
        <div class="syrbox4nr fz13">
        
  <form name="form1" accept-charset="gb2312" action="http://swt.gssmart.com/guahao/sockt.php" method="post" onSubmit="return guahao()" >
            <table>
              <tr>
                <td height="26"  width="62">姓      名</td>
                <td><input name="名称" id="name" class="input1 border2" type="text" /></td>
              </tr>
              <tr height="14">
                <td></td>
              </tr>
              <tr>
                <td width="62">联系电话</td>
                <td><input id="hometel" name="电话" class="input1 border2" type="text" /></td>
              </tr>
              <tr height="14" >
                <td></td>
              </tr>
              <tr>
                <td width="62">预约时间</td>
                <td><input id="yudate" class="input2 gray border2" name="预约时间" onclick="WdatePicker()" placeholder="请选择预约时间" type="text" /></td>
              </tr>
              <tr height="14" >
                <td></td>
              </tr>
              <tr>
                <td width="62">就诊状态</td>
                <td><input id="ismode" type="radio" name="就诊状态"  checked="checked" />
                  <label> 初诊</label>
                  <input id="ismode" class="input3" type="radio" name="就诊状态" />
                  <label> 复诊</label></td>
              </tr>
              <tr height="14" >
                <td></td>
              </tr>
            </table>
            <div class="sybtn">
 <button class="sybtn1" type="submit" value=""><img src="/static/pc/images/syrth8.jpg" width="120" height="40" /></button>
              <button type="submit" value=""><img src="/static/pc/images/syrth9.jpg" width="120" height="40" /></button>
          
            </div>
          </form>
        </div>
      </div>