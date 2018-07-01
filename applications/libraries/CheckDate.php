<?php 

namespace Kwrite\Lib;


class CheckDate
{
	public static function make($value)
	{
		if (strlen($value) != 10)
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

		foreach (array(range(0, 3), range(5, 6), range(8, 9)) as $round)
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

		return true;
	}
}