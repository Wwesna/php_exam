<?php

	class Date
	{
		public function __construct($date = null)
		{
			if (!empty($date)) {
				$this->date = date('Y-m-d', strtotime($date));
			} else {
				$this->date = date('Y-m-d', time());
			}

			// если дата не передана - пусть берется текущая
		}
		public function getDay()
		{
			return date('d', strtotime($this->date));

			// возвращает день
		}
		public function getMonth($lang = null)
		{
			// возвращает месяц
			// переменная $lang может принимать значение ru или en
			// если эта не пуста - пусть месяц будет словом на заданном языке

			$ruMonths =  [1 => 'Январь' , 'Февраль' , 'Март' , 'Апрель' , 'Май' , 'Июнь' , 'Июль' , 'Август' , 'Сентябрь' , 'Октябрь' , 'Ноябрь' , 'Декабрь' ];
        	$engMonths = [1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        	$dateMonth = date('n', strtotime($this->date));
        
        	if (empty($lang)) {
            	return date('m', strtotime($this->date));
        	}

        	if ($lang == 'ru') {
            	return $ruMonths[$dateMonth];
        	}
        	if ($lang == 'en') {
            	return $engMonths[$dateMonth];
        	}
		}
		public function getYear()
		{
			return date('Y', strtotime($this->date));
			
			// возвращает год
		}
		public function getWeekDay($lang = null)
		{
			// возвращает день недели
			// переменная $lang может принимать значение ru или en
			// если эта не пуста - пусть месяц будет словом на заданном языке

			$daysRu =  [1 => 'Понедельник' , 'Вторник' , 'Среда' , 'Четверг' , 'Пятница' , 'Суббота' , 'Воскресенье'] ;
        	$daysEn =  [1 => 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        	$dateDay = date('w', strtotime($this->date));
       
        	if (empty($lang)) {
            	return date('w', strtotime($this->date));
        	}
        
        	if ($lang == 'ru') {
            	return $daysRu[$dateDay];
        	}
        	if ($lang == 'en') {
            	return $daysEn[$dateDay];
        	}
		}
		public function addDay($value)
		{
			$dateM = date_create($this->date);
        	date_modify($dateM, "+$value days");
        	return date_format($dateM, 'Y-m-d');
			
			// добавляет значение $value к дню
		}
		public function subDay($value)
		{
			$dateM = date_create($this->date);
        	date_modify($dateM, "-$value days");
        	return date_format($dateM, 'Y-m-d');
			
			// отнимает значение $value от дня
		}
		public function addMonth($value)
		{
			$dateM = date_create($this->date);
        	date_modify($dateM, "+$value month");
        	return date_format($dateM, 'Y-m-d');
			
			// добавляет значение $value к месяцу
		}
		public function subMonth($value)
		{
			$dateM = date_create($this->date);
        	date_modify($dateM, "-$value month");
        	return date_format($dateM, 'Y-m-d');
			
			// отнимает значение $value от месяца
		}
		public function addYear($value)
		{
			$dateM = date_create($this->date);
        	date_modify($dateM, "+$value year");
        	return date_format($dateM, 'Y-m-d');
			
			// добавляет значение $value к году
		}
		public function subYear($value)
		{
			$dateM = date_create($this->date);
        	date_modify($dateM, "-$value year");
        	return date_format($dateM, 'Y-m-d');
			
			// отнимает значение $value от года
		}
		public function format($format)
		{
			return date($format, strtotime($this->date));
			
			// выведет дату в указанном формате
			// формат пусть будет такой же, как в функции date
		}
		public function __toString()
		{
			return $this->date;
			
			// выведет дату в формате 'год-месяц-день'
		}
	}
	
	$date = new Date('2025-12-31');
	
	echo $date->getYear();  // выведет '2025'
	echo $date->getMonth(); // выведет '12'
	echo $date->getDay();   // выведет '31'
	
	echo $date->getWeekDay();     // выведет '3'
	echo $date->getWeekDay('ru'); // выведет 'среда'
	echo $date->getWeekDay('en'); // выведет 'wednesday'

	echo (new Date('2025-12-31'))->addYear(1); // '2026-12-31'
	echo (new Date('2025-12-31'))->addDay(1);  // '2026-01-01'
	
	
	
?>