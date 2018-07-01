<?php 

namespace Kwrite\MysqlEngine\Engine;
use Kwrite\Lib\MakeWhere;


class DeleteWhereLimit
{
	public $tableName = "";
	public $tableLimit = 0;
	public $tableWhere = array();

	public function make()
	{
		return 'DELETE FROM '.
			$this->tableName.' WHERE '.
			MakeWhere::make($this->tableWhere).' LIMIT '.
			$this->tableLimit.'';
	}
}