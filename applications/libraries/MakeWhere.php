<?php

namespace Kwrite\Lib;
use \Kwrite\Lib\MakeWhereSimbols;
use \Kwrite\Lib\MakeValue;


class MakeWhere
{
	public static function make($values)
	{
		$tmp = "";
		foreach ($values as $row)
		{
			$tmp = sprintf(
				"%s AND %s %s %s",
				$tmp,
				$row[0],
				MakeWhereSimbols::make($row[1]),
				MakeValue::make($row[2])
			);
		}

		return substr($tmp, 5);
	}
}