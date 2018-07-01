<?php 

namespace Kwrite\MysqlEngine\Engine;
use Kwrite\Lib\MakeWhere;


class DeleteWhere
{
	public $tableName = "";
	public $tableWhere = array();

	public function make()
	{
		return 'DELETE FROM '.
			$this->tableName.' WHERE '.
			MakeWhere::make($this->tableWhere).'';
	}
}