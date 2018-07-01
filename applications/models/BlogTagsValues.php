<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\SelectWhereLimit;


class BlogTagsValues extends SelectWhereLimit
{
	public $tableName = "blog_tags";
	public $tableLimit = 1;
	public $blog_tags = "";
	public $id_blog = 0;

	public function values()
	{
		$this->tableCollumns[0] = "name";
		$this->tableCollumns[1] = "slogan";
		$this->tableCollumns[2] = "description";
		$this->tableWhere[0] = array("slogan", "==", $this->blog_tags);
		$this->tableWhere[1] = array("id_blog", "==", $this->id_blog);

		$conn = new Connection();
		return $conn->select(
			$this->make(),
			$this->tableCollumns
		);
	}
}