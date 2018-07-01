<?php 

namespace Kwrite\Lib;


class CheckEmpty
{
	public static function make($value)
	{
		return (strlen($value) == 0);
	}
}