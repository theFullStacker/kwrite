<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\CountWhere;


class BlogTagsCount extends CountWhere
{
	public $tableName = "blog_tags";
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