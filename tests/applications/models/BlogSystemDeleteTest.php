<?php

use PHPUnit\Framework\TestCase;
use Kwrite\Applications\Models\BlogSystemDelete;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;
use Kwrite\MysqlEngine\Engine\SelectWhereLimit;


class BlogSystemDeleteTest extends TestCase
{
	public function testDelete()
	{
		$this->create();

		$model = new BlogSystemDelete();
		$model->blog_system = "novo_blog";
		$model->delete();

		$data = $this->data();
		$this->assertEquals(count($data), 0);
	}

	private function data()
	{
		$query = new SelectWhereLimit();
		$query->tableName = "blog_system";
		$query->tableLimit = 1;
		$query->tableCollumns[0] = "name";
        $query->tableCollumns[1] = "slogan";
        $query->tableCollumns[2] = "description";
        $query->tableWhere[0] = array("slogan", "==", "novo_blog");

        $conn = new Connection();
        return $conn->select(
            $query->make(),
            $query->tableCollumns
        );
	}

	private function create()
	{
		$query = new Insert();
        $query->tableName = "blog_system";
        $query->name = "Novo Blog";
        $query->slogan = "novo_blog";
        $query->description = "Descrição do blog.";
        $query->created_at = "datetime();";
        $query->updated_at = "datetime();";

        $conn = new Connection();
        $conn->insert(
            $query->make()
        );
	}
}