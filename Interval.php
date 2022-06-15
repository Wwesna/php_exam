<?php
require_once 'Date.php';

	class Interval
	{
		public function __construct($date1, $date2)
		{
			$this->date1 = $date1;
        	$this->date2 = $date2;
		}
		
		public function toDays()
		{
			// возвращаем разницу в днях
			$dateO = date_create($this->date1);
			$dateT = date_create($this->date2);
			return date_diff($dateO, $dateT)->format('%a дней');
		
		}
		
		public function toMonths()
		{
			// возвращаем разницу в месяцах
			$dateO = date_create($this->date1);
        	$dateT = date_create($this->date2);
        	return date_diff($dateO, $dateT)->format('%m месяцев');
		}
		
		public function toYears()
		{
			// возвращаем разницу в годах
			$dateO = date_create($this->date1);
        	$dateT = date_create($this->date2);
        	return date_diff($dateO, $dateT)->format('%y лет');

		}
		
		public function __toString()
		{
			// выводим результат в виде массива
			// ['years' => '', 'months' => '', 'days' => '']

			$this->dateArray = ['years' => $this->toYears(),
            	'months' => $this->toMonths(),
            	'days' => $this->toDays()
        	];
        	return var_dump($this->dateArray);

		}
	}

?>