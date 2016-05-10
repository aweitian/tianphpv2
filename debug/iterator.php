<?php
/**
 * Date: May 10, 2016
 * Author: Awei.tian
 * Description: 
 */
class myData implements IteratorAggregate {

	private $array = [];
	const TYPE_INDEXED = 1;
	const TYPE_ASSOCIATIVE = 2;

	public function __construct( array $data, $type = self::TYPE_INDEXED ) {
		reset($data);
		while( list($k, $v) = each($data) ) {
			$type == self::TYPE_INDEXED ?
			$this->array[] = $v :
			$this->array[$k] = $v;
		}
	}

	public function getIterator() {
		return new ArrayIterator($this->array);
	}

}

$obj = new myData(['one'=>'php','javascript','three'=>'c#','java',], 2);

foreach($obj as $key => $value) {
	var_dump($key, $value);
	echo PHP_EOL;
}