<?php 

namespace Kwrite\MysqlEngine\Engine;
use Kwrite\Lib\MakeValues;
use Kwrite\Lib\MakeCollumns;


class Insert
{
	public $tableName = "";

	public function make()
	{
		$tableCollumns = array();
		$tableValues = array();

		foreach ($this as $key => $value)
		{
			switch ($key)
			{
				case 'tableName':
					continue;
					break;
				
				default:
					$len = count($tableCollumns);
					$tableCollumns[$len] = $key;
					$tableValues[$len] = $value;
					break;
			}
		}

		return 'INSERT INTO '.
			$this->tableName.' ('.
			MakeCollumns::make($tableCollumns).') VALUES ('.
			MakeValues::make($tableValues).')';
	}
}