<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\DeleteWhere;


class BlogTagsDeleteAll extends DeleteWhere
{
	public $tableName = "blog_tags";
	public $id_blog = 0;

	public function delete()
	{
		$this->tableWhere[0] = array("id_blog", "==", $this->id_blog);

		$conn = new Connection();
		$conn->delete($this->make());
	}
}