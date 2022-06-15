<?php
require_once 'Tag.php';

	class ListItem extends Tag
	{
		public function __construct()
		{
			// Вызываем конструктор родителя, передав в качестви имени 'li':
			parent::__construct('li');
		}

	}

    class HtmlList extends Tag
	{
        private $items = []; // массив для хранения лишек
		
		public function addItem(ListItem $li)
		{
			$this->items[] = $li;
			return $this; // вернем $this для цепочки
		}

        // Переопределим метод родителя:
		public function show()
		{
			$result = $this->open(); // открывающий тег
		
            foreach ($this->items as $item) 
            {
                $result .= $item->show(); // вызываем метод show
            }
		
		    $result .= $this->close(); // закрывающий тег

		    return $result;
		}

        public function __toString() 
        {
            return $this->show();
        }

	}

    class Ul extends HtmlList 
    {
        public function __construct() 
        {
            parent::__construct('ul');
        }

    }
    
    
    class Ol extends HtmlList 
    {
        public function __construct() 
        {
            parent::__construct('ol');
        }
        
    }

?>