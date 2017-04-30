<?php

include_once('../scripts/Finvisor.php');


// переменная для хранения результата
$result = 'Файл не был успешно загружен на сервер';
// путь для загрузки файлов
//$upload_path = dirname(__FILE__) . '/cash_service/';
// если файл был успешно загружен, то
//if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {

    $obj = new FinancialServices();
    $obj->loadData($_FILES['file']['name']);

/*    $info = getdate();
    $date = $info['mday'];
    $month = $info['mon'];
    $year = $info['year'];

    $current_date = $date.'_'.$month.'_'. $year;

    // получаем расширение исходного файла
    $extension_file = mb_strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    // получаем уникальное имя под которым будет сохранён файл
    $full_unique_name = $upload_path .'cash_service_'.$current_date.'.'.$extension_file;
    // перемещает файл из временного хранилища в указанную директорию
    if (move_uploaded_file($_FILES['file']['tmp_name'], $full_unique_name)) {
        // записываем в переменную $result ответ
        $result = 'Файл загружен и доступен по адресу: <b>/' . substr($full_unique_name, strlen($_SERVER['DOCUMENT_ROOT'])+1) . '</b>';
    } else {
        // записываем в переменную $result сообщение о том, что произошла ошибка
        $result = "Произошла обшибка при загрузке файла на сервер";
    }*/
//}
// возвращаем результат (ответ сервера)
echo $_FILES['file']['name'];
?>