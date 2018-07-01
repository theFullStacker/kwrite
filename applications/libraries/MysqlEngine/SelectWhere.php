<?php 

namespace Kwrite\MysqlEngine\Engine;
use Kwrite\Lib\MakeWhere;
use Kwrite\Lib\MakeCollumns;


class SelectWhere
{
	public $tableName = "";
	public $tableWhere = array();
	public $tableCollumns = array();

	public function make()
	{
		return 'SELECT '.
			MakeCollumns::make($this->tableCollumns).' FROM '.
			$this->tableName.' WHERE '.
			MakeWhere::make($this->tableWhere).'';
	}
}