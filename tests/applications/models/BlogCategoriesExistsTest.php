<?php

use PHPUnit\Framework\TestCase;
use Kwrite\Applications\Models\BlogCategoriesExists;
use Kwrite\Applications\Models\BlogSystemCreate;
use Kwrite\Applications\Models\BlogSystemDelete;
use KWrite\Applications\Models\BlogSystemId;
use Kwrite\DBConnection\Connection;
use Kwrite\MysqlEngine\Engine\Insert;
use Kwrite\MysqlEngine\Engine\Delete;


class BlogCategories extends TestCase
{
	public function testExists()
	{
		$this->createBlog();
		$this->create();

		$model = new BlogCategoriesExists();
		$model->blog_categories = "nova_categoria";
		$model->id_blog = $this->idBlog();
		$data = $model->exists();

		$this->assertEquals($data, true);
		$this->drop();
		$this->dropBlog();
	}

	public function testNotExists()
	{
		$model = new BlogCategoriesExists();
		$model->blog_categories = "nova_categoria";
		$model->id_blog = $this->idBlog();
		$data = $model->exists();

		$this->assertEquals($data, false);
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
		$query->tableName = "blog_categories";
		$query->name = "Nova Categoria";
		$query->slogan = "nova_categoria";
		$query->description = "Descrição da categoria.";
		$query->created_at = "datetime();";
		$query->updated_at = "datetime();";
		$query->id_blog = $this->idBlog();
		$query->id_parent = 0;

		$conn = new Connection();
		$conn->insert($query->make());
	}

	private function drop()
	{
		$query = new Delete();
		$query->tableName = "blog_categories";

		$conn = new Connection();
		$conn->delete(
			$query->make()
		);
	}
}