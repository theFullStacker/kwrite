<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;


class BlogTagsCreate extends Insert
{
	public $tableName = "blog_tags";
	public $id_blog = 0;
	public $name = "";
	public $slogan = "";
	public $description = "";
	public $created_at = "datetime();";
	public $updated_at = "datetime();";

	public function create()
	{
		$conn = new Connection();
		$conn->insert($this->make());
	}
}