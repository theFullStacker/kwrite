<?php

namespace Kwrite\MysqlEngine\Engine;
use Kwrite\Lib\MakeSet;


class Update
{
	public $tableName = "";
	public $tableSet = array();

	public function make()
	{
		return 'UPDATE '.
			$this->tableName.' SET '.
			MakeSet::make($this->tableSet).'';
	}
}