<?php 

namespace Kwrite\MysqlEngine\Engine;
use Kwrite\Lib\MakeCollumns;


class Select
{
	public $tableName = "";
	public $tableCollumns = array();

	public function make()
	{
		return 'SELECT '.
			MakeCollumns::make($this->tableCollumns).' FROM '.
			$this->tableName.'';
	}
}