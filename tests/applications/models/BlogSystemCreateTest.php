<?php

use PHPUnit\Framework\TestCase;
use Kwrite\Applications\Models\BlogSystemCreate;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\SelectWhereLimit;
use Kwrite\MysqlEngine\Engine\Delete;


class BlogSystemCreateTest extends TestCase
{
	public function testCreate()
	{
		$model = new BlogSystemCreate();
		$model->name = "Novo Blog";
		$model->slogan = "novo_blog";
		$model->description = "Descrição do blog.";
		$model->create();

		$data = $this->data();
		$this->assertEquals($data[0]["name"], "Novo Blog");
		$this->assertEquals($data[0]["slogan"], "novo_blog");
		$this->assertEquals($data[0]["description"], "Descrição do blog.");

		$this->drop();
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

	private function drop()
	{
        $query = new Delete();
        $query->tableName = "blog_system";

        $conn = new Connection();
        $conn->delete(
            $query->make()
        );
	}
}