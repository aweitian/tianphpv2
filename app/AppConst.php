<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */


define("DISEASE_GRP_ID",1);
define("SYMPTOM_GRP_ID",2);


#在错误达到设定次数后是否使用验证码
define("USER_LOGIN_USE_VC",true);
#在一天之内一个IP不用验证码登陆错误次数(如果上面设定为FALSE，这个值无效)
define("USER_LOGIN_TRY_TIMES",5);
#在一天之内一个IP最大登陆错误次数，超过404
define("USER_LOGIN_TRY_MAX",20);