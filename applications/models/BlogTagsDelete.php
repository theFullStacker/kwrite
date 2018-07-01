<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\DeleteWhereLimit;


class BlogTagsDelete extends DeleteWhereLimit
{
	public $tableName = "blog_tags";
	public $tableLimit = 1;
	public $blog_tags = "";
	public $id_blog = 0;

	public function delete()
	{
		$this->tableWhere[0] = array("slogan", "==", $this->blog_tags);
		$this->tableWhere[1] = array("id_blog", "==", $this->id_blog);

		$conn = new Connection();
		$conn->delete($this->make());
	}
}