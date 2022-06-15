<?php
require_once 'Tag.php';
require_once 'Link.php';

echo "<title>Анджей Сапковский. Последнее желание</title>"; 


echo (new Link())->setAttr('href', '1.php')->setText('Первая глава')->show();
echo '<br>';
echo (new Link())->setAttr('href', '2.php')->setText('Вторая глава')->show();
echo '<br>';
echo (new Link())->setAttr('href', '3.php')->setText('Третья глава')->show();
echo '<br>';
echo (new Link())->setAttr('href', '4.php')->setText('Четвертая глава')->show();
echo '<br>';
echo (new Link())->setAttr('href', '5.php')->setText('Пятая глава')->show();

?>