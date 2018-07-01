<?php 

namespace Kwrite\Lib;


class CheckEmail
{
	public static function make($value)
	{
		$value = strtolower($value);
		$length_value = strlen($value);
		$length_pointer = 0;
		$length_at = 0;
		$position_at = 0;
		$position_pointer = array();
		$position_pointer_length = 0;

		if ($length_value > 64 or $length_value < 5)
		{
			return false;
		}

		for ($i=0; $i < $length_value; $i++)
		{
			switch ($value[$i])
			{
				case 'a': case 'b': case 'c': case 'd': case 'e': case 'f': case 'g':
				case 'h': case 'i': case 'j': case 'k': case 'l': case 'm': case 'n':
				case 'o': case 'p': case 'q': case 'r': case 's': case 't': case 'u':
				case 'v': case 'w': case 'x': case 'y': case 'z': case '0': case '1':
				case '2': case '3': case '4': case '5': case '6': case '7': case '8':
				case '9': case '-': case '_':
					continue;

				case '@':
					$length_at += 1;
					$position_at = $i;
					continue;

				case '.':
					$length_pointer += 1;
					$position_pointer[$position_pointer_length] = $i;
					$position_pointer_length += 1;
					continue;
				
				default:
					return false;
			}
		}

		if ($length_at != 1)
		{
			return false;
		}

		if ($position_at == 0)
		{
			return false;
		}

		if ($value[ ($length_value - 1) ] == "@")
		{
			return false;
		}

		switch ($value[ ($position_at - 1) ])
		{
			case '.':
			case '@':
				return false;
		}

		switch ($value[ ($position_at + 1) ])
		{
			case '.':
			case '@':
				return false;
		}

		foreach ($position_pointer as $position_key => $position_value)
		{
			if ($position_value == 0)
			{
				return false;
			}

			if ($position_value == ($length_value - 1))
			{
				return false;
			}

			switch ($value[ ($position_value - 1) ])
			{
				case '.':
				case '@':
					return false;
			}

			switch ($value[ ($position_value + 1) ])
			{
				case '.':
				case '@':
					return false;
			}
		}

		return true;
	}
}