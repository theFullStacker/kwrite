<?php 

namespace Kwrite\MysqlEngine\Engine;
use Kwrite\Lib\MakeWhere;
use Kwrite\Lib\MakeCollumns;


class SelectWhereLimit
{
	public $tableName = "";
	public $tableLimit = 0;
	public $tableWhere = array();
	public $tableCollumns = array();

	public function make()
	{
		return 'SELECT '.
			MakeCollumns::make($this->tableCollumns).' FROM '.
			$this->tableName.' WHERE '.
			MakeWhere::make($this->tableWhere).' LIMIT '.
			$this->tableLimit.'';
	}
}