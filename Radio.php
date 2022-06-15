<?php
require_once 'Tag.php';
require_once 'Form.php';
require_once 'Submit.php';
require_once 'Input.php';
require_once 'Hidden.php';

	class Radio extends Tag
	{
        public function __construct()
		{
			$this->setAttr('type', 'radio');
			$this->setAttr('value', '1');
			parent::__construct('input');
		}
        
        public function open()
        {
            $name = $this->getAttr('name');
    
            if ($name) {
                $hidden = (new Hidden)->setAttr('name', $name)->setAttr('value', '0');
        
                if (isset($_REQUEST[$name])) 
                {
                    $value = $_REQUEST[$name];
            
                    if ($value == 1) 
                    {
                        $this->setAttr('checked');
                    } 
                    else 
                    {
                        $this->removeAttr('checked');
                    }
                }
        
                return $hidden->open() . parent::open();
            } 
            else 
            {
                return parent::open();
            }
        }

        public function __toString()
        {
            return $this->open();
        }

    }

    /*$form = (new Form)->setAttrs(['action' => ' ', 
		'method' => 'GET']);
	
 	echo $form->open();
		echo (new Radio)->setAttr('name', 'radio');
		echo (new Radio)->setAttr('name', 'radio');
		echo (new Input)->setAttr('name', 'user');
		echo new Submit;
	echo $form->close();*/

 ?>