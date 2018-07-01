<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\SelectWhereLimit;


class BlogCategoriesExists extends SelectWhereLimit
{
	public $tableName = "blog_categories";
	public $tableLimit = 1;
	public $blog_categories = "";
	public $id_blog = 0;

	public function exists()
	{
		$this->tableCollumns[0] = "id";
		$this->tableWhere[0] = array("slogan", "==", $this->blog_categories);
		$this->tableWhere[1] = array("id_blog", "==", $this->id_blog);

		$conn = new Connection();
		$data = $conn->select(
			$this->make(),
			$this->tableCollumns
		);

		return count($data) != 0;
	}
}