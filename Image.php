<?php
require_once 'Tag.php';

	class Image extends Tag
	{
		public function __construct()
		{
			$this->setAttr('src', ''); // установим атрибут src
			$this->setAttr('alt', ''); // установим атрибут alt
			
			parent::__construct('img'); // вызовем конструктор родителя, передав имя тега
		}

        public function __toString()
		{
			return parent::open(); // вызываем метод родителя
		}

	}

?>