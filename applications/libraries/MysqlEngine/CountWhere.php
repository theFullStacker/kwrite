<?php 

namespace Kwrite\MysqlEngine\Engine;
use Kwrite\Lib\MakeWhere;


class CountWhere
{
	public $tableName = "";
	public $tableCollumn = "";
	public $tableWhere = array();

	public function make()
	{
		return 'SELECT COUNT('.
			$this->tableCollumn.') AS '.
			$this->tableCollumn.' FROM '.
			$this->tableName.' WHERE '.
			MakeWhere::make($this->tableWhere).'';
	}
}