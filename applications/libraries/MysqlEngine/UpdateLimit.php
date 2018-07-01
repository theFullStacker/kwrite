<?php 

namespace Kwrite\MysqlEngine\Engine;
use Kwrite\Lib\MakeSet;


class UpdateLimit
{
	public $tableSet = array();
	public $tableName = "";
	public $tableLimit = 0;

	public function make()
	{
		return 'UPDATE '.
			$this->tableName.' SET '.
			MakeSet::make($this->tableSet).' LIMIT '.
			$this->tableLimit.'';
	}
}