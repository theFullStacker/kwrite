<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\SelectWhereLimit;


class BlogCategoriesId extends SelectWhereLimit
{
	public $tableName = "blog_categories";
	public $tableLimit = 1;
	public $blog_categories = "";
	public $id_blog = 0;

	public function get()
	{
		$this->tableCollumns[0] = "id";
		$this->tableWhere[0] = array("slogan", "==", $this->blog_categories);
		$this->tableWhere[1] = array("id_blog", "==", $this->id_blog);

		$conn = new Connection();
		$data = $conn->select(
			$this->make(),
			$this->tableCollumns
		);

		if (count($data) == 0)
		{
			return 0;
		}

		return ((int) $data[0]["id"]);
	}
}