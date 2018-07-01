<?php

namespace Kwrite\Lib;
use \Kwrite\Lib\MakeValue;


class MakeValues
{
	public static function make($values)
	{
		$tmp = "";
		foreach ($values as $key => $value)
		{
			$tmp = sprintf(
				"%s, %s",
				$tmp,
				MakeValue::make($value)
			);
		}

		return substr($tmp, 2);
	}
}