<?php 

namespace Kwrite\MysqlEngine\Engine;
use Kwrite\Lib\MakeCollumns;
use Kwrite\Lib\MakeOrderby;


class SelectOrderby
{
	public $tableName = "";
	public $tableCollumns = array();
	public $tableOrderbyCollumn = "";
	public $tableOrderbyDirection = "";

	public function make()
	{
		return 'SELECT '.
			MakeCollumns::make($this->tableCollumns).' FROM '.
			$this->tableName.' ORDER BY '.
			$this->tableOrderbyCollumn.' '.
			MakeOrderby::make($this->tableOrderbyDirection).'';
	}
}