<?php
require_once 'Tag.php';
require_once 'Form.php';
require_once 'Submit.php';
require_once 'Input.php';

    class Textarea extends Tag
    {
	    public function __construct()
	    {
		    parent::__construct('textarea');
	    }
    
        public function show() 
        {
            $message = $this->getAttr('name');
            if ($message) 
            {
                if (isset($_REQUEST[$message])) 
                {
                    $value = $_REQUEST[$message];
                    $this->setAttr('value', $value);
                }
            }
            return parent::show();
        }

        public function __toString() 
        {
            return $this->show();
        }
    
    }
    /*$form = (new Form)->setAttrs(['action' => 'test.php', 'method' => 'GET']);
	
	echo $form->open();
		
		echo (new Textarea)->setAttr('name', 'message')->show();
		echo new Submit;
	echo $form->close();*/
?>