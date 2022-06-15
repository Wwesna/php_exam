<?php
require_once 'iTag.php';

	class Tag
	{
		private $name; // свойство для хранения имени тега
        private $attrs = []; // изначально пустой массив
        private $text = ''; 
		
		public function __construct($name)
		{
			$this->name = $name;
		}

        // возвращает название тега
        public function getName()
		{
			return $this->name;
		}
        
        //возвращет текст тега
        public function getText()
		{
			return $this->text;
		}

        //возвращает массив всех атрибутов тега
        public function getAttrs()
		{
			return $this->attrs;
		}

        //Реализуйте геттер getAttr
        public function getAttr($name)
		{
			if (isset($this->attrs[$name])) {
				return $this->attrs[$name];
			} else {
				return null;
			}
		}

        // Открывающий тег, текст и закрывающий тег
        public function show()
		{
			return $this->open() . $this->text . $this->close();
		}

        // Выводим открывающую часть тега:
		public function open()
		{
			$name = $this->name;
			$attrsStr = $this->getAttrsStr($this->attrs);
			
			return "<$name$attrsStr>";
		}

        // Выводим закрывающую часть тега:
		public function close()
		{
			$name = $this->name;
			return "</$name>";
		}

        //установка текста
        public function setText($text)
		{
			$this->text = $text;
			return $this;
		}

        //установка атрибута
		public function setAttr($name, $value)
		{
			$this->attrs[$name] = $value;
			return $this; // возвращаем $this чтобы была цепочка
		}

        //установка атрибутов
        public function setAttrs($attrs)
		{
			foreach ($attrs as $name => $value)
			{
				$this->setAttr($name, $value);
			}
			return $this;
		}

        //удаление атрибутов
        public function removeAttr($name)
		{
			unset($this->attrs[$name]);
			return $this;
		}

        //установка класса
        public function addClass($className)
	    {
		    if (isset($this->attrs['class'])) {
			    $classNames = explode(' ', $this->attrs['class']);
			
			    if (!in_array($className, $classNames)) {
				    $classNames[] = $className;
				    $this->attrs['class'] = implode(' ', $classNames);
			    }
		            } else {
			            $this->attrs['class'] = $className;
		            }
		
		    return $this;
	    }

        //удаление класса
        public function removeClass($className)
	    {
		    if (isset($this->attrs['class'])) {
			    $classNames = explode(' ', $this->attrs['class']);
			
			    if (in_array($className, $classNames)) {
				    $classNames = $this->removeElem($className, $classNames);
				    $this->attrs['class'] = implode(' ', $classNames);
			    }
		    }
		
		    return $this;
	    }

        // Формируем строку с атрибутами:
		    private function getAttrsStr($attrs)
	        {
		        if (!empty($attrs)) {
			       $result = '';
			
			     foreach ($attrs as $name => $value) {
				        // Если значение атрибута равно true:
				        if ($value === true) {
					       $result .= " $name"; // это атрибут без значения
				        } else {
					        $result .= " $name=\"$value\""; // это атрибут со значением
				        }
			        }
			
			        return $result;
		        } else {
			        return '';
		        }
	        }

        private function removeElem($elem, $arr)
	    {
		    $key = array_search($elem, $arr); // находим ключ элемента по его тексту
		    array_splice($arr, $key, 1); // удаляем элемент
		
		    return $arr; // возвращаем измененный массив
	    }

	}
  
?>