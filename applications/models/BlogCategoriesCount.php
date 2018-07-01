<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\CountWhere;


class BlogCategoriesCount extends CountWhere
{
	public $tableName = "blog_categories";
	public $tableCollumn = "id";
	public $id_blog = 0;

	public function count()
	{
		$this->tableWhere[0] = array("id_blog", "==", $this->id_blog);

		$conn = new Connection();
		return $conn->count(
			$this->make(),
			$this->tableCollumn
		);
	}
}