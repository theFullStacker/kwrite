<?php 

namespace Kwrite\MysqlEngine\Engine;


class Delete
{
	public $tableName = "";

	public function make()
	{
		return 'DELETE FROM '.
			$this->tableName.'';
	}
}