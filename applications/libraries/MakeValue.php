<?php

namespace Kwrite\Lib;
use \Kwrite\Lib\CheckDate;
use \Kwrite\Lib\CheckTime;
use \Kwrite\Lib\CheckDatetime;


class MakeValue
{
	public static function make($value)
	{
		switch (gettype($value))
		{
			case 'array':
			case 'NULL':
				return $value;
			
			case 'boolean':
				return (string) strlen((string) $value);

			case 'integer':
			case 'float':
			case 'double':
			case 'numeric':
				return ((string) $value);

			case 'string':
				switch ($value)
				{
					case 'date();':
						return '"'.date("Y-m-d").'"';

					case 'time();':
						return '"'.date("H:i:s").'"';

					case 'datetime();':
						return '"'.date("Y-m-d H:i:s").'"';

					default:

						switch (strlen($value))
						{
							case 16:
								if (substr($value, 0, 6) == "date: ")
								{
									if (CheckDate::make(substr($value, 6, 16)))
									{
										return '"'.substr($value, 6, 16).'"';
									}
									return '"'. date("Y-m-d") .'"';
								}
								return '"'.addslashes($value).'"';

							case 14:
								if (substr($value, 0, 6) == "time: ")
								{
									if (CheckTime::make(substr($value, 6, 14)))
									{
										return '"'.substr($value, 6, 14).'"';
									}
									return '"'. date("H:i:s") .'"';
								}
								return '"'.addslashes($value).'"';

							case 29:
								if (substr($value, 0, 10) == "datetime: ")
								{
									if (CheckDatetime::make(substr($value, 10, 29)))
									{
										return '"'.substr($value, 10, 29).'"';
									}
									return '"'. date("Y-m-d Y-m-d") .'"';
								}
								return '"'.addslashes($value).'"';
							
							default:
								return '"'.addslashes($value).'"';
						}
						return '"'.addslashes($value).'"';
				}
				return '"'.addslashes($value).'"';
		}

	}
}