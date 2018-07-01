<?php 

namespace Kwrite\MysqlEngine\Engine;
use Kwrite\Lib\MakeCollumns;


class SelectLimit
{
	public $tableName = "";
	public $tableLimit = 0;
	public $tableCollumns = array();

	public function make()
	{
		return 'SELECT '.
			MakeCollumns::make($this->tableCollumns).' FROM '.
			$this->tableName.' LIMIT '.
			$this->tableLimit.'';
	}
}