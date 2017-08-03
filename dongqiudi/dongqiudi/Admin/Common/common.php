<?php
/**
 * [getPic description]
 * 获取文本中首张图片地址
 * @param  [type] $content [description]
 * @return [type]          [description]
 */
  function getPic($content){
        if(preg_match_all("/(src)=([\"|']?)([^ \"'>]+\.(gif|jpg|jpeg|bmp|png))\\2/i", $content, $matches)) {
            $str=$matches[3][0];
    /* 		println($matches); */
            if (preg_match('/\/uploads\/image/', $str)) {
                /* die('333'); */
                return $str1=substr($str,7);
            }
        }
    }
   // php无损截取包括html标签的字符串
   /*  @param string $string        	
 * @param unknown $length        	
 * @param string $replace        	
 * @return string
 */
function wpgo_substrUtf8($string, $length, $replace = '…') {
	$str = $string;
	// 先截取指定长度的字符串
	if (strlen ( $string ) < $length) {
		$str = substr ( $string, 0 );
	} else {
		$char = ord ( $string [$length - 1] );
		if ($char >= 224 && $char <= 239) {
			$str = substr ( $string, 0, $length - 1 );
		} else {
			$char = ord ( $string [$length - 2] );
			if ($char >= 224 && $char <= 239) {
				$str = substr ( $string, 0, $length - 2 );
			} else {
				$str = substr ( $string, 0, $length );
			}
		}
	}
	// 提取截取出来的字符串中出现的html开始和闭合标签的值和位置索引
	$starts = $start_str = $ends = array ();
	preg_match_all ( '/<\w+[^>]*>?/', $str, $starts, PREG_OFFSET_CAPTURE );
	preg_match_all ( '/<\/\w+>/', $str, $ends, PREG_OFFSET_CAPTURE );

	$cut_pos = 0;
	$last_str = '';
	if (! empty ( $starts [0] )) {
		$starts = array_reverse ( $starts [0] );
		if (! empty ( $ends [0] )) {
			$ends = array_reverse ( $ends [0] );
		}
		// 根据开始标签和结束标签的字符串索引大小和值是否相等来获取可以截取的长度
		foreach ( $starts as $sk => $s ) {
			if ($auto = strripos ( $s [0], '/>' )) {
				if ($cut_pos < $auto) {
					$cut_pos = $s [1];
					$last_str = $s [0];
					unset ( $starts [$sk] );
				}
			} else {
				preg_match ( '/<(\w+).*>?/', $s [0], $start_str );
				if (! empty ( $ends )) {
					foreach ( $ends as $ek => $e ) {
						$end_str = trim ( $e [0], '</>' );
						if ($end_str == $start_str [1] && $e [1] > $s [1]) {
							if ($cut_pos < $e [1]) {
								$cut_pos = $e [1];
								$last_str = $e [0];
							}
							unset ( $ends [$ek] );
							break;
						} else {
							$last_str = '';
							$cut_pos = 0;
						}
					}
				} else {
					$last_str = '';
					$cut_pos = $s [1];
				}
			}
		}
		if ($cut_pos == 0) {
			$starts = array_pop ( $starts );
			$cut_pos = $starts [1];
			$last_str = '';
		}
	}
	// 拼凑剩余的字符串，不包括html标签
	$res_str = substr ( $str, 0, $cut_pos ) . $last_str;
	$less_pos = substr ( $str, strlen ( $res_str ) );
	$less_str = substr ( $less_pos, 0, strpos ( $less_pos, '<' ) );
	$res_str .= $less_str == false ? $less_pos : $less_str;
	return $res_str . $replace;
}
   
   function preg_rep($content){
		$content = preg_replace("/<a[^>]*>/i", "", $content); 
		$content = preg_replace("/<\/a>/i", "", $content);  
		$content = preg_replace("/<div[^>]*>/i", "", $content); 
		$content = preg_replace("/<\/div>/i", "", $content);     
		$content = preg_replace("'<script[^>]*?>.*?</script>'si", "", $content); 
		$content = preg_replace("/<!--[^>]*-->/i", "", $content);//注释内容 
		$content = preg_replace("/style=.+?['|\"]/i",'',$content);//去除style
		$content = preg_replace("/class=.+?['|\"]/i",'',$content);//去除class
		$content = preg_replace("/id=.+?['|\"].+?['|\"]/i",'',$content);//去除id
		$content = preg_replace("/onclick=.+?[\"]/i",'',$content);//去除id
		$content = preg_replace("/lang=.+?['|\"]/i",'',$content);//去除lang   
		$content = preg_replace("/width=.+?['|\"]/i",'',$content);//去除width  
		$content = preg_replace("/height=.+?['|\"]/i",'',$content);//去除height
		$content = preg_replace("/border=.+?['|\"]/i",'',$content);//去除border
		$content = preg_replace("/face=.+?['|\"]/i",'',$content);//去除face 
		$content = preg_replace("/face=.+?['|\"]/i",'',$content);//去除样式 只允许小写 正则匹配没有带 i 参数 
		return $content;
	}
   
   
   
   
   
?>