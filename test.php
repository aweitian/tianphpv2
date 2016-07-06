<?php
function utf8Substr($str, $from, $len)
{
    return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
                       '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
                       '$1',$str);
}



echo utf8Substr("taw我是中国人，我爱中国..", 0,9);
?>