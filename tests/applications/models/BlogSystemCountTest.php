<?php

use PHPUnit\Framework\TestCase;
use Kwrite\Applications\Models\BlogSystemCount;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;
use Kwrite\MysqlEngine\Engine\Delete;


class BlogSystemCountTest extends TestCase
{
	public function testCount()
	{
		$this->create();

		$model = new BlogSystemCount();
		$this->assertEquals($model->count(), 1);

		$this->drop();
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