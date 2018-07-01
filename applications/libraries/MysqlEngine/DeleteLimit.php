<?php 

namespace Kwrite\MysqlEngine\Engine;


class DeleteLimit
{
	public $tableName = "";
	public $tableLimit = 0;

	public function make()
	{
		return 'DELETE FROM '.
			$this->tableName.' LIMIT '.
			$this->tableLimit.'';
	}
}