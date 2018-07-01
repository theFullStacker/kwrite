<?php 

namespace Kwrite\MysqlEngine\Engine;


class Count
{
	public $tableName = "";
	public $tableCollumn = "";

	public function make()
	{
		return 'SELECT COUNT('.
			$this->tableCollumn.') AS '.
			$this->tableCollumn.' FROM '.
			$this->tableName.'';
	}
}