<?php

namespace Kwrite\Applications\Models;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\SelectWhereOrderbyLimitOffset;


class BlogCategoriesAll extends SelectWhereOrderbyLimitOffset
{
	public $tableName = "blog_categories";
	public $tableLimit = 30;
	public $page = 0;
	public $id_blog = 0;
	public $tableOrderbyCollumn = "id";
	public $tableOrderbyDirection = "asc";

	public function all()
	{
		$this->tableCollumns[0] = "id";
        $this->tableCollumns[1] = "id_parent";
        $this->tableCollumns[2] = "name";
        $this->tableCollumns[3] = "slogan";
        $this->tableCollumns[4] = "description";
        $this->tableCollumns[5] = "created_at";
        $this->tableCollumns[6] = "updated_at";
        $this->tableOffset = ($this->page * $this->tableLimit);
        $this->tableWhere[0] = array("id_blog", "==", $this->id_blog);

        $conn = new Connection();
        return $conn->select(
        	$this->make(),
        	$this->tableCollumns
        );
	}
}