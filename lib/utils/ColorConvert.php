<?php
class ColorConvert{
	/**
	 * 计算颜色相近，一般用于表格行背景交差
	 * Enter description here ...
	 * @param unknown_type $h
	 * @param unknown_type $s
	 * @param unknown_type $b
	 */
	public function getNeighborColor($rgb,$destination=6){
		$arr = self::rgb2hsb($rgb);
		if($arr[2]>50){
			$arr[2] = $arr[2]-$destination;
		}else{
			$arr[2] = $arr[2]+$destination;
		}
		return self::hsb2rgb($arr[0], $arr[1], $arr[2]);
	}
	public function getLightNeighborColor($rgb,$destination=6){
		$arr = self::rgb2hsb($rgb);
		$arr[2] = $arr[2]+$destination;
		if($arr[2]>100){
			$arr[2]=100;
		}
		return self::hsb2rgb($arr[0], $arr[1], $arr[2]);
	}
	public function getDarkNeighborColor($rgb,$destination=6){
		$arr = self::rgb2hsb($rgb);
		$arr[2] = $arr[2]-$destination;
		if($arr[2]<0){
			$arr[2]=0;
		}
		return self::hsb2rgb($arr[0], $arr[1], $arr[2]);
	}
	
	public function hsb2rgb($h,$s,$b){
		$ret = $this->hsb2rgbArr($h,$s,$b);
		if($ret === false)return "#000";
		$r = dechex($ret['red']);if(strlen($r)===1)$r="0".$r;
		$g = dechex($ret['green']);if(strlen($g)===1)$g="0".$g;
		$b = dechex($ret['blue']);if(strlen($b)===1)$b="0".$b;
		return "#".$r.$g.$b;
	}	
	public function hsb2rgbArr($hue, $saturation, $brightness) {
	    $hue = $this->significantRound($hue, 3);
	    //echo $hue;
	    if ($hue < 0 || $hue > 360) {
	        throw new LengthException('Argument $hue is not a number between 0 and 360');
	    }
	    $hue = $hue == 360 ? 0 : $hue;
	    $saturation = $this->significantRound($saturation, 3);
	    if ($saturation < 0 || $saturation > 100) {
	        throw new LengthException('Argument $saturation is not a number between 0 and 100');
	    }
	    $brightness = $this->significantRound($brightness, 3);
	    if ($brightness < 0 || $brightness > 100) {
	        throw new LengthException('Argument $brightness is not a number between 0 and 100.');
	    }
	    $hexBrightness = (int) round($brightness * 2.55);
	    if ($saturation == 0) {
	        return array('red' => $hexBrightness, 'green' => $hexBrightness, 'blue' => $hexBrightness);
	    }
	    $Hi = floor($hue / 60);
	    $f = $hue / 60 - $Hi;
	    $p = (int) round($brightness * (100 - $saturation) * .0255);
	    $q = (int) round($brightness * (100 - $f * $saturation) * .0255);
	    $t = (int) round($brightness * (100 - (1 - $f) * $saturation) * .0255);
	    switch ($Hi) {
	        case 0:
	            return array('red' => $hexBrightness, 'green' => $t, 'blue' => $p);
	        case 1:
	            return array('red' => $q, 'green' => $hexBrightness, 'blue' => $p);
	        case 2:
	            return array('red' => $p, 'green' => $hexBrightness, 'blue' => $t);
	        case 3:
	            return array('red' => $p, 'green' => $q, 'blue' => $hexBrightness);
	        case 4:
	            return array('red' => $t, 'green' => $p, 'blue' => $hexBrightness);
	        case 5:
	            return array('red' => $hexBrightness, 'green' => $p, 'blue' => $q);
	    }
	    return false;
	}
	public function rgb2hsbArr($R, $G, $B)    // RGB values:    0-255, 0-255, 0-255
	{                                // HSV values:    0-360, 0-100, 0-100
	    // Convert the RGB byte-values to percentages
    
	    $R = ($R / 255);
	    $G = ($G / 255);
	    $B = ($B / 255);
	
	    // Calculate a few basic values, the maximum value of R,G,B, the
	    //   minimum value, and the difference of the two (chroma).
	    $maxRGB = max($R, $G, $B);
	    $minRGB = min($R, $G, $B);
	    $chroma = $maxRGB - $minRGB;
	
	    // Value (also called Brightness) is the easiest component to calculate,
	    //   and is simply the highest value among the R,G,B components.
	    // We multiply by 100 to turn the decimal into a readable percent value.
	    $computedV = 100 * $maxRGB;
	
	    // Special case if hueless (equal parts RGB make black, white, or grays)
	    // Note that Hue is technically undefined when chroma is zero, as
	    //   attempting to calculate it would cause division by zero (see
	    //   below), so most applications simply substitute a Hue of zero.
	    // Saturation will always be zero in this case, see below for details.
	    if ($chroma == 0)
	        return array(0, 0, round($computedV));
	
	    // Saturation is also simple to compute, and is simply the chroma
	    //   over the Value (or Brightness)
	    // Again, multiplied by 100 to get a percentage.
	    $computedS = 100 * ($chroma / $maxRGB);
	
	    // Calculate Hue component
	    // Hue is calculated on the "chromacity plane", which is represented
	    //   as a 2D hexagon, divided into six 60 degree sectors. We calculate
	    //   the bisecting angle as a value 0 <= x < 6, that represents which
	    //   portion of which sector the line falls on.
	    if ($R == $minRGB)
	        $h = 3 - (($G - $B) / $chroma);
	    elseif ($B == $minRGB)
	        $h = 1 - (($R - $G) / $chroma);
	    else
	        $h = 5 - (($B - $R) / $chroma);
	
	    // After we have the sector position, we multiply it by the size of
	    //   each sector's arc (60 degrees) to obtain the angle in degrees.
	    $computedH = 60 * $h;
	
	    $ret = array(round($computedH), round($computedS), round($computedV));
	    //var_dump($ret);
	    return $ret;
	}
	public function rgb2hsb($rgb){
		$r = hexdec(substr($rgb,1,2));//
		$g = hexdec(substr($rgb,3,2));
		$b = hexdec(substr($rgb,5,2));//echo substr($rgb,5,2);
		return $this->rgb2hsbArr($r,$g,$b);
	}
	private function significantRound($number, $precision) {
	    if (!is_numeric($number)) {
	        throw new InvalidArgumentException('Argument $number must be an number.');
	    }
	    if (!is_int($precision)) {
	        throw new InvalidArgumentException('Argument $precision must be an integer.');
	    }
	    return round($number, $precision - strlen(floor($number)));
	}	
}