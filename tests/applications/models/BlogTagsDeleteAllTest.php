<?php

use PHPUnit\Framework\TestCase;
use Kwrite\Applications\Models\BlogTagsDeleteAll;
use Kwrite\Applications\Models\BlogSystemCreate;
use Kwrite\Applications\Models\BlogSystemDelete;
use KWrite\Applications\Models\BlogSystemId;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;
use Kwrite\MysqlEngine\Engine\Delete;
use Kwrite\MysqlEngine\Engine\SelectWhereLimit;


class BlogTagsDeleteAllTest extends TestCase
{
	public function testDelete()
	{
		$this->createBlog();
		$this->create();

		$model = new BlogTagsDeleteAll();
		$model->id_blog = $this->idBlog();
		$model->delete();

		$data = $this->data();
		$this->assertEquals(count($data), 0);
		$this->drop();
		$this->dropBlog();
	}

	private function createBlog()
	{
		$model = new BlogSystemCreate();
		$model->name = "Novo Blog";
		$model->slogan = "novo_blog";
		$model->description = "Descrição do blog.";
		$model->create();
	}

	private function dropBlog()
	{
		$model = new BlogSystemDelete();
		$model->blog_system = "novo_blog";
		$model->delete();
	}

	private function idBlog()
	{
		$model = new BlogSystemId();
		$model->blog_system = "novo_blog";
		return $model->get();
	}

	private function data()
	{
		$query = new SelectWhereLimit();
		$query->tableName = "blog_tags";
		$query->tableLimit = 1;
		$query->tableCollumns[0] = "name";
        $query->tableCollumns[1] = "slogan";
        $query->tableCollumns[2] = "description";
        $query->tableWhere[0] = array("slogan", "==", "nova_tag");
        $query->tableWhere[1] = array("id_blog", "==", $this->idBlog());

        $conn = new Connection();
        return $conn->select(
            $query->make(),
            $query->tableCollumns
        );
	}

	private function create()
	{
		$query = new Insert();
		$query->tableName = "blog_tags";
		$query->name = "Nova Tag";
		$query->slogan = "nova_tag";
		$query->description = "Descrição da tag.";
		$query->created_at = "datetime();";
		$query->updated_at = "datetime();";
		$query->id_blog = $this->idBlog();

		$conn = new Connection();
		$conn->insert($query->make());
	}

	private function drop()
	{
		$query = new Delete();
        $query->tableName = "blog_tags";

        $conn = new Connection();
        $conn->delete(
            $query->make()
        );
	}
}