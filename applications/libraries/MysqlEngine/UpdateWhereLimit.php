<?php 

namespace Kwrite\MysqlEngine\Engine;
use Kwrite\Lib\MakeSet;
use Kwrite\Lib\MakeWhere;


class UpdateWhereLimit
{
	public $tableLimit = 0;
	public $tableName = "";
	public $tableSet = array();
	public $tableWhere = array();

	public function make()
	{
		return 'UPDATE '.
			$this->tableName.' SET '.
			MakeSet::make($this->tableSet).' WHERE '.
			MakeWhere::make($this->tableWhere).' LIMIT '.
			$this->tableLimit.'';
	}
}