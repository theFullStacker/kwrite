<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\SelectWhereLimit;


class BlogCategoriesValues extends SelectWhereLimit
{
	public $tableName = "blog_categories";
	public $tableLimit = 1;
	public $blog_categories = "";
	public $id_blog = 0;

	public function values()
	{
		$this->tableCollumns[0] = "name";
		$this->tableCollumns[1] = "slogan";
		$this->tableCollumns[2] = "description";
		$this->tableCollumns[3] = "id_parent";
		$this->tableWhere[0] = array("slogan", "==", $this->blog_categories);
		$this->tableWhere[1] = array("id_blog", "==", $this->id_blog);

		$conn = new Connection();
		return $conn->select(
			$this->make(),
			$this->tableCollumns
		);
	}
}