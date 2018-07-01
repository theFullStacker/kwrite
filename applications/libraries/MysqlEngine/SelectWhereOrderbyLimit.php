<?php 

namespace Kwrite\MysqlEngine\Engine;
use Kwrite\Lib\MakeWhere;
use Kwrite\Lib\MakeCollumns;
use Kwrite\Lib\MakeOrderby;


class SelectWhereOrderbyLimit
{
	public $tableName = "";
	public $tableLimit = 0;
	public $tableWhere = array();
	public $tableCollumns = array();
	public $tableOrderbyCollumn = "";
	public $tableOrderbyDirection = "";

	public function make()
	{
		return 'SELECT '.
			MakeCollumns::make($this->tableCollumns).' FROM '.
			$this->tableName.' WHERE '.
			MakeWhere::make($this->tableWhere).' ORDER BY '.
			$this->tableOrderbyCollumn.' '.
			MakeOrderby::make($this->tableOrderbyDirection).' LIMIT '.
			$this->tableLimit.'';
	}
}