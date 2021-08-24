## Моё выполнение тестового задания на позицию Junior PHP Developer AdvCake 

<h3> само тестовое задание:</h3>
Напиши метод, который принимает на вход строку и меняет порядок букв в каждом слове на обратный с сохранением регистра и пунктуации.<br>

Например:<br>
$result = revertCharacters("Привет! Давно не виделись.");<br>
echo $result; // Тевирп! Онвад ен ьсиледив.<br>

Также напиши unit-тесты для этого метода.

## Описание разработки:

<p style="text-align: center">Разработка заключалась в двух основных задачах:</p>

<h4>1) разработка</h4>
Был разработан класс <strong>textTransformator</strong>, в котором три основные функции: <br>
<span style="margin-left: 20px;"></span><strong>1.1 revertCharacters</strong> основная функция для трансформации предложений<br>
<span style="margin-left: 20px;"></span><strong>1.2 explodeString</strong> вспомогательная функция для трансформера<br>
<span style="margin-left: 20px;"></span><strong>1.3 revertWord</strong> функция для преобразования слов<br>
<h6>Особенности:</h6>
<span style="margin-left: 20px;"></span>Основная функция может принимать в себя не только строку, но и числа, как целые, так и с плавующей запятой, массивы, логические переменные

<h4>2) Тестирование</h4>
<span style="margin-left: 20px;"></span> Написал phpunit тест который проверяет как заявленные в задании данные, так и различные данные, предложения, числа, слова, разные типы данных
## С чем столкнулся 
<span style="margin-left: 20px;"></span> В самой задачи проблем не возникло, за исключением поддержки Кириллицы - именно из-за этого получилась конечная архитектура.<br>
<span style="margin-left: 20px;"></span> Максимально старался избежать хардкора и костылей<br>
<span style="margin-left: 20px;"></span> Из-за поддержки кириллицы ограничил минимальную версию php 7.4<br>
<span style="margin-left: 20px;"></span> При написании unit теста подумал, что трансформатор, принимающий только строки на вход это скучно и расширил функциционал<br>
## Как запустить:
<span style="margin-left: 20px;"></span> клонируем<br>
<span style="margin-left: 20px;"></span> Минимальная необходимая версия php: 7.4<br>
<span style="margin-left: 20px;"></span> composer install<br>
<span style="margin-left: 20px;"></span> Проверяем, в корне файл index.php отобразит выполнение задания<br>
<span style="margin-left: 20px;"></span> в папке tests/advCake лежит phpUnit тест для проверки задачи<br>
<span style="margin-left: 20px;"></span> в файле phpunit.xml лежит файл конфига для phpunit<br>

