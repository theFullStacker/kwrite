<?php

use PHPUnit\Framework\TestCase;
use Kwrite\Applications\Models\BlogSystemExists;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;
use Kwrite\MysqlEngine\Engine\Delete;


class BlogSystemExistsTest extends TestCase
{
	public function testExists()
	{
		$this->create();

		$model = new BlogSystemExists();
		$model->blog_system = "novo_blog";
		$data = $model->exists();

		$this->assertEquals($data, true);
		$this->drop();
	}

	public function testNotExists()
	{
		$model = new BlogSystemExists();
		$model->blog_system = "novo_blog";
		$data = $model->exists();

		$this->assertEquals($data, false);
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