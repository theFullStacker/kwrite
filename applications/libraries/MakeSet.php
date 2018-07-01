<?php

namespace Kwrite\Lib;
use \Kwrite\Lib\MakeValue;


class MakeSet
{
	public static function make($values)
	{
		$tmp = "";
		foreach ($values as $key => $value)
		{
			$tmp = sprintf(
				"%s, %s = %s",
				$tmp,
				$key,
				MakeValue::make($value)
			);
		}

		return substr($tmp, 2);
	}
}