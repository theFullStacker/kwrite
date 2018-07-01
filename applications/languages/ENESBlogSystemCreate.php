<?php

namespace Kwrite\Applications\Languages;


class Language
{
    public $language = array(
	"language" => "pt-br",
	"slogan" => "New blog",
	"description" => "Create a new blog",
	"noScript" => "This page needs JavaScript to work.",

	"form" => array(		
            "error" => array(
		"empty" => array(
                    "name" => "Fill in this field.",
                    "slogan" => "Fill in this field."
		),

		"limit" => array(
                    "name" => "Enter a maximum of 20 characters.",
                    "slogan" => "Enter a maximum of 20 characters.",
                    "description" => "Enter a maximum of 255 characters."
		),

		"regex" => array(
                    "name" => "The name format is not valid.",
                    "slogan" => "The slogan format is not valid.",
                    "description" => "The description format is not valid."
		),

		"exists" => array(
                    "slogan" => "A blog with this name already exists on the system."
		)
            ),

            "label" => array(
		"name" => "Name",
		"slogan" => "Slogan",
		"description" => "Description"
            ),

            "placeholder" => array(
		"name" => "Blog name here",
		"slogan" => "Blog slogan here",
		"description" => "Blog description here"
            ),

            "description" => array(
		"name" => "The blog name is as it appears in the title of your site. You can only use letters, letters with accent and spaces.",
		"slogan" => "The blog slogan is used in the app to differentiate this site from others. Only lowercase letters are underscore.",
		"description" => "The blog description is to describe the function of this blog. Support (letters, numbers and some special characters). do not use line breaks or quotation marks."
            ),

            "buttons" => array(
		"submit" => "Create"
            )
	)
    );
}