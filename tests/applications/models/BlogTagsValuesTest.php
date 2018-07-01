<?php

use PHPUnit\Framework\TestCase;
use Kwrite\Applications\Models\BlogTagsValues;
use Kwrite\Applications\Models\BlogSystemCreate;
use Kwrite\Applications\Models\BlogSystemDelete;
use KWrite\Applications\Models\BlogSystemId;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;
use Kwrite\MysqlEngine\Engine\Delete;


class BlogTagsValuesTest extends TestCase
{
	public function testValues()
	{
		$this->createBlog();
		$this->create();

		$model = new BlogTagsValues();
		$model->blog_tags = "nova_tag";
		$model->id_blog = $this->idBlog();
		$data = $model->values();

		$this->assertEquals($data[0]["name"], "Nova Tag");
		$this->assertEquals($data[0]["slogan"], "nova_tag");
		$this->assertEquals($data[0]["description"], "Descrição da tag.");
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