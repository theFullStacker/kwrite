<?php 

namespace Kwrite\Lib;


class CheckTime
{
	public static function make($value)
	{
		if (strlen($value) != 8)
		{
			return false;
		}

		for ($i = 2; $i <= 5; $i += 3)
		{ 
			if (substr($value, $i, 1) != ":")
			{
				return false;
			}
		}

		for ($i = 0; $i <= 6; $i += 3)
		{
			for ($i1 = $i; $i1 <= $i + 1; $i1++)
			{
				switch (substr($value, $i1, 1))
				{
					case '0':
					case '1':
					case '2':
					case '3':
					case '4':
					case '5':
					case '6':
					case '7':
					case '8':
					case '9':
						continue;
					
					default:
						return false;
				}
			}
		}

		$tmp = (int) substr($value, 0, 2);
		if ($tmp > 23 or $tmp < 0)
		{
			return false;
		}

		$tmp = (int) substr($value, 3, 2);
		if ($tmp > 59 or $tmp < 0)
		{
			return false;
		}

		$tmp = (int) substr($value, 6, 2);
		if ($tmp > 59 or $tmp < 0)
		{
			return false;
		}

		return true;
	}
}