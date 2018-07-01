<?php

namespace Kwrite\Lib;


class MakeIndexers
{
	public static function make($dict)
	{
		$tmp = "";
		foreach ($dict as $key => $value)
		{
			$tmp = "{$tmp}, {$value}";
		}

		return substr($tmp, 2);
	}
}