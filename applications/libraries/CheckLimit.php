<?php 

namespace Kwrite\Lib;


class CheckLimit
{
	public static function make($content, $min, $max)
	{
		$length = strlen($content);
		if ($length < $min || $length > $max)
		{
			return true;
		}
		return false;
	}
}