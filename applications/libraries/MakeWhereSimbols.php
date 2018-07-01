<?php

namespace Kwrite\Lib;


class MakeWhereSimbols
{
	public static function make($simbol)
	{
		switch ($simbol)
		{
			case '>':
			case '<':
			case '>=':
			case '<=':
			case '!=':
				return (string) $simbol;
			
			default:
				return "=";
		}
	}
}