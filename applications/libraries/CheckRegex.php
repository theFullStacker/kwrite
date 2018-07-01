<?php

namespace Kwrite\Lib;


class CheckRegex
{
	public $value = "";

	private $letters = array(
		"a_z" => array(
			0 => 'a',
			1 => 'b',
			2 => 'c',
			3 => 'd',
			4 => 'e',
			5 => 'f',
			6 => 'g',
			7 => 'h',
			8 => 'i',
			9 => 'j',
			10 => 'k',
			11 => 'l',
			12 => 'm',
			13 => 'n',
			14 => 'o',
			15 => 'p',
			16 => 'q',
			17 => 'r',
			18 => 's',
			19 => 't',
			20 => 'u',
			21 => 'v',
			22 => 'w',
			23 => 'x',
			24 => 'y',
			25 => 'z'
		),

		"A_Z" => array(
			0 => 'A',
			1 => 'B',
			2 => 'C',
			3 => 'D',
			4 => 'E',
			5 => 'F',
			6 => 'G',
			7 => 'H',
			8 => 'I',
			9 => 'J',
			10 => 'K',
			11 => 'L',
			12 => 'M',
			13 => 'N',
			14 => 'O',
			15 => 'P',
			16 => 'Q',
			17 => 'R',
			18 => 'S',
			19 => 'T',
			20 => 'U',
			21 => 'V',
			22 => 'W',
			23 => 'X',
			24 => 'Y',
			25 => 'Z'
		),

		"0_9" => array(
			0 => '0',
			1 => '1',
			2 => '2',
			3 => '3',
			4 => '4',
			5 => '5',
			6 => '6',
			7 => '7',
			8 => '8',
			9 => '9'
		),

		"á_ú" => array(
			0 => "á",
			1 => "é",
			2 => "í",
			3 => "ó",
			4 => "ú"
		),

		"à_ù" => array(
			0 => "à",
			1 => "è",
			2 => "ì",
			3 => "ò",
			4 => "ù"
		),

		"â_û" => array(
			0 => "â",
			1 => "ê",
			2 => "î",
			3 => "ô",
			4 => "û"
		),

		"ã_ũ" => array(
			0 => "ã",
			1 => "ẽ",
			2 => "ĩ",
			3 => "õ",
			4 => "ũ"
		),

		"ä_ü" => array(
			0 => "ä",
			1 => "ë",
			2 => "ï",
			3 => "ö",
			4 => "ü"
		),


		"Á_Ú" => array(
			0 => "Á",
			1 => "É",
			2 => "Í",
			3 => "Ó",
			4 => "Ú"
		),

		"À_Ù" => array(
			0 => "À",
			1 => "È",
			2 => "Ì",
			3 => "Ò",
			4 => "Ù"
		),

		"Â_Û" => array(
			0 => "Â",
			1 => "Ê",
			2 => "Î",
			3 => "Ô",
			4 => "Û"
		),

		"Ã_Ũ" => array(
			0 => "Ã",
			1 => "Ẽ",
			2 => "Ĩ",
			3 => "Õ",
			4 => "Ũ"
		),

		"Ä_Ü" => array(
			0 => "Ä",
			1 => "Ë",
			2 => "Ï",
			3 => "Ö",
			4 => "Ü"
		),

		"ç_Ç" => array(
			0 => "ç",
			1 => "Ç",
			2 => "ḉ",
			3 => "Ḉ"
		),

		"y_Y" => array(
			0 => "ý",
			1 => "Ý",
			2 => "ỳ",
			3 => "Ỳ",
			4 => "ỹ",
			5 => "Ỹ",
			6 => "ŷ",
			7 => "Ŷ",
			8 => "ÿ",
			9 => "Ÿ"
		)
	);

	public function common($regex)
	{
		for ($i = 0; $i < strlen($regex); $i += 3)
		{
			switch (substr($regex, $i, 3))
			{
				case "a_z";
				case "A_Z";
				case "0_9";
					foreach ($this->letters[substr($regex, $i, 3)] as $key => $value)
					{
						$this->value = str_replace(
							$value,
							"",
							$this->value
						);
					}
					break;
				
				default:
					$otherExpression = str_split(substr($regex, $i, 3));
					foreach ($otherExpression as $key => $value)
					{
						$this->value = str_replace(
							$value,
							"",
							$this->value
						);
					}
					break;
			}
		}
	}

	public function simbols($regex)
	{
		switch ($regex)
		{
			case "a": $regex = "á_úà_ùâ_ûã_ũä_ü"; break;
			case "A": $regex = "Á_ÚÀ_ÙÂ_ÛÃ_ŨÄ_Ü"; break;
			case "aA": $regex = "á_úà_ùâ_ûã_ũä_üÁ_ÚÀ_ÙÂ_ÛÃ_ŨÄ_Ü"; break;
			case "ac": $regex = "á_úà_ùâ_ûã_ũä_üç_Ç"; break;
			case "Ac": $regex = "Á_ÚÀ_ÙÂ_ÛÃ_ŨÄ_Üç_Ç"; break;
			case 'aAc': $regex = "á_úà_ùâ_ûã_ũä_üÁ_ÚÀ_ÙÂ_ÛÃ_ŨÄ_Üç_Ç"; break;
			case "ay": $regex = "á_úà_ùâ_ûã_ũä_üy_Y"; break;
			case "Ay": $regex = "Á_ÚÀ_ÙÂ_ÛÃ_ŨÄ_Üy_Y"; break;
			case 'aAy': $regex = "á_úà_ùâ_ûã_ũä_üÁ_ÚÀ_ÙÂ_ÛÃ_ŨÄ_Üy_Y"; break;
			case 'aAyc': $regex = "á_úà_ùâ_ûã_ũä_üÁ_ÚÀ_ÙÂ_ÛÃ_ŨÄ_Üç_Çy_Y"; break;
		}

		for ($i = 0; $i < strlen($regex); $i += 5)
		{
			switch (substr($regex, $i, 5))
			{
				case "á_ú":
				case "à_ù":
				case "â_û":
				case "ã_ũ":
				case "ä_ü":
				case "Á_Ú":
				case "À_Ù":
				case "Â_Û":
				case "Ã_Ũ":
				case "Ä_Ü":
				case "ç_Ç":
				case "y_Y":
					foreach ($this->letters[substr($regex, $i, 5)] as $key => $value)
					{
						$this->value = str_replace(
							$value,
							"",
							$this->value
						);
					}
					break;
			}
		}
	}

	public function make()
	{
		return strlen($this->value) == 0;
	}
}