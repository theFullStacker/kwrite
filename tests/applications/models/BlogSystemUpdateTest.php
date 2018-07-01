<?php

use PHPUnit\Framework\TestCase;
use Kwrite\Applications\Models\BlogSystemUpdate;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;
use Kwrite\MysqlEngine\Engine\Delete;
use Kwrite\MysqlEngine\Engine\SelectWhereLimit;


class BlogSystemUpdateTest extends TestCase
{
	public function testUpdate()
	{
		$this->create();

		$model = new BlogSystemUpdate();
		$model->name = "Blog Atualizado";
		$model->slogan = "blog_atualizado";
		$model->description = "Descrição do blog.";
		$model->blog_system = "novo_blog";
		$model->update();

		$data = $this->data();
		$this->assertEquals($data[0]["name"], "Blog Atualizado");
		$this->assertEquals($data[0]["slogan"], "blog_atualizado");
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
        $query->tableWhere[0] = array("slogan", "==", "blog_atualizado");

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