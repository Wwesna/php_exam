<?php
require_once 'Tag.php';
require_once 'Form.php';


	class Input extends Tag
	{
		public function __construct()
		{
			parent::__construct('input');
		}

        // Переопределяем метод родителя:
		public function open()
		{
			$inputName = $this->getAttr('name'); // имя инпута

            // Если атрибут name задан у инпута:
			if ($inputName) {
			    // Если форма была отправлена и есть данные с именем нашего инпута:
			    if (isset($_REQUEST[$inputName]))
				 {
				    $value = $_REQUEST[$inputName]; // получаем значение из $_REQUEST
                    /*global $sum;
					$sum = $sum + $value;*/
				    $this->setAttr('value', $value); // записываем в value инпута
			    }
            }
			
			return parent::open(); // вызываем метод open родителя
		}

        public function __toString()
		{
			return $this->open();
		}

	}

    /*$form = (new Form)->setAttrs(['action' => '', 'method' => 'GET']);
	
 	echo $form->open();
		echo (new Input)->setAttr('name', 'a');
		echo (new Input)->setAttr('name', 'b');
		echo (new Input)->setAttr('name', 'c');
		echo (new Input)->setAttr('name', 'd');
		echo (new Input)->setAttr('name', 'e');
		echo (new Input)->setAttr('type', 'submit');
	echo $form->close();
    echo $sum;*/

?>