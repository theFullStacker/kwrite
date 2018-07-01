<?php 

namespace Kwrite\Lib;


class CheckDatetime
{
	public static function make($value)
	{
		if (strlen($value) != 19)
		{
			return false;
		}

		for ($i = 4; $i <= 7; $i += 3)
		{ 
			if (substr($value, $i, 1) != "-")
			{
				return false;
			}
		}

		for ($i = 13; $i <= 16; $i += 3)
		{
			if (substr($value, $i, 1) != ":")
			{
				return false;
			}
		}

		foreach (array(range(0,3),range(5,6),range(8,9),range(11,12),range(14,15),range(17,18)) as $round)
		{
			foreach ($round as $round_position)
			{
				switch (substr($value, $round_position, 1))
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

		$tmp = (int) substr($value, 11, 2);
		if ($tmp > 23 or $tmp < 0)
		{
			return false;
		}

		for ($i = 14; $i <= 17; $i += 3)
		{ 
			$tmp = (int) substr($value, $i, 2);
			if ($tmp > 59 or $tmp < 0)
			{
				return false;
			}
		}

		if (substr($value, 10, 1) != " ")
		{
			return false;
		}

		return true;
	}
}