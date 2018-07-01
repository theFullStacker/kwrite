<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\UpdateWhere;


class BlogCategoriesAlterParent extends UpdateWhere
{
	public $tableName = "blog_categories";
	public $id_parent = 0;
	public $if_parent = 0;
	public $id_blog = 0;
	public $created_at = "datetime();";
	public $updated_at = "datetime();";

	public function alterParent()
	{
		$this->tableSet["id_parent"] = $this->id_parent;
		$this->tableWhere[0] = array("id_blog", "==", $this->id_blog);
		$this->tableWhere[1] = array("id_parent", "==", $this->if_parent);

		$conn = new Connection();
		$conn->update(
			$this->make()
		);
	}
}