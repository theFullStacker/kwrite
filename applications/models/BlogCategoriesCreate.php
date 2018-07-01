<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;


class BlogCategoriesCreate extends Insert
{
	public $tableName = "blog_categories";
	public $name = "";
	public $slogan = "";
	public $description = "";
	public $id_parent = 0;
	public $id_blog = 0;
	public $created_at = "datetime();";
	public $updated_at = "datetime();";

	public function create()
	{
		$conn = new Connection();
		$conn->insert(
			$this->make()
		);
	}
}