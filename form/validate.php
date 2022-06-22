<?php 
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/form/Validator.php');

// Подготовка ассоциативного массива с данными для проверки
$vars = array(); 

foreach ($_POST as $key => $value) {
	$keySaf = strip_tags($key);
	$valueSaf = strip_tags($value);
	$vars["{$keySaf}"] = $valueSaf;
}

if (array_key_exists('file', $_FILES)) {
	$vars['file'] = $_FILES['file'];
} 

// Подготовка правил для проверки;
$rules = array();
$rules['name'] = 'required,min_len=2,max_len=20,reg=/^[А-Яа-я_-]+$/u';
$rules['surname'] = 'required,min_len=2,max_len=30,reg=/^[А-Яа-я_-]+$/u';
$rules['email'] = 'required,email';
$rules['birthday'] = 'required,reg=/^\d{4}-\d{2}-\d{2}$/';
$rules['tel'] = 'required,reg=/^\+7\s\(\d{3}\)\d{3}-\d{2}-\d{2}$/';
$rules['city'] = 'required,min_len=2,max_len=35,reg=/^[\sА-Яа-я_-]+$/u';
$rules['file'] = 'required,file';


// Валидация данных
$validator = new Validator($vars);

foreach ($rules as $key => $value) {
	$validator->Expect($key, $value);
}
$result = $validator->Validate();

// Отправка ответа
$data = array();
if ($result) {
	$data['result'] = true;
} else {
	$data['result'] = false;
}
header('Content-type: application/json');
echo json_encode( $data );
