<?php

namespace Kwrite\Lib;


class MakeOrderby
{
	public static function make($direction)
	{
		$direction = str_replace(" ", "", $direction);
		$direction = strtolower($direction);

		switch ($direction)
		{
			case 'top':
			case 'asc':
				return "ASC";

			case 'bottom':
			case 'desc':
				return "DESC";
			
			default:
				return "ASC";
		}
	}
}