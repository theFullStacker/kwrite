<?php

namespace Kwrite\Applications\Languages;


class Language
{
    public $language = array(

	"language" => "pt-br",
	"slogan" => "Novo blog",
	"description" => "Criar um novo blog",
	"noScript" => "Essa pagina precisa de javascript para funcionar.",

	"form" => array(
            "error" => array(		
		"empty" => array(
                    "name" => "Preencha esse campo.",
                    "slogan" => "Preencha esse campo."
		),

		"limit" => array(
                    "name" => "Informe no maximo 20 caracteres.",
                    "slogan" => "Informe no maximo 20 caracteres.",
                    "description" => "Informe no maximo 255 caracteres."
		),

		"regex" => array(
                    "name" => "O formato de nome informado não é valido.",
                    "slogan" => "O formato de slogan informado não é valido.",
                    "description" => "O formato de descrição informado não é valido."
		),

		"exists" => array(
                    "slogan" => "Já existe um blog com esse nome no sistema."
		)
            ),

            "label" => array(
                "name" => "Nome",
		"slogan" => "Slogan",
		"description" => "Descrição"
            ),

            "placeholder" => array(
		"name" => "Nome do blog aqui",
		"slogan" => "Slogan do blog aqui",
		"description" => "Descrição do blog aqui"
            ),

            "description" => array(
		"name" => "O nome de blog é como aparece no titulo do seu site. Você pode usar apenas letras, letras com acento é espaços.",
		"slogan" => "O slogan de blog é usado na aplicação para diferenciar esse site de outros. só suporta letras minusculas é underscope.",
		"description" => "A descrição de blog serve para descrever qual a função desse blog. suporta letras, numeros, alguns caracteres especiais. não use quebra de linha ou aspas."
            ),

            "buttons" => array(
		"submit" => "Criar"
            )
	)
    );
}
