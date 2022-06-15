<?php
require_once 'Tag.php';
require_once 'Form.php';
require_once 'Submit.php';
require_once 'Input.php';
require_once 'Hidden.php';

    class Select extends Tag
    {
        private $opt = [];

        public function __construct()
        {
            parent::__construct('select');
        }

        public function add(Option $op)
        {
            $this->opt[] = $op; 
            return $this;
        }

        public function show()
        {
            $str = '';
            foreach ($this->opt as $op) 
            {
                $op->is_sel();
                $str .=  $op->show();
            }
            return $this->open() . $str . $this->close();
        }
    
    }

    class Option extends Tag
    {

        public function __construct()
        {
            parent::__construct('option');
            return $this;
        }
        
        public function __toString()
        {
            return $this->show();
        }
    
        public function is_sel()
        {
            if(isset($_REQUEST['list']))
            {
                if ($this->getText()==$_REQUEST['list'])
                {
                    $this->setSelected();
                }
                else
                {
                    $this->removeAttr('selected');
                }
            }
        }
        
        public function setSelected()
        {
            $this->setAttr('selected');
            return $this;
        }
    
    }

    /*$form = (new Form)->setAttrs(['action' => ' ', 'method' => 'GET']);
	
 	echo $form->open();
		echo (new Input)->setAttr('name', 'test');
	$sel = new Select;
		echo $sel->setAttr('name', 'list')
			->add( (new Option())->setText('item1') )
			->add( (new Option())->setText('item2') )
			->add( (new Option())->setText('item3') )
			->show();
		
		echo new Submit;
	echo $form->close();*/

?>