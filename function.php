<?php

function t1()
{
    return time();
}

function t2()
{
    $unix_time = time();
    return date('D', $unix_time);
}

function t3($year)
{
    return date('L', mktime(0, 0, 0, 1, 1, $year));
}

function t4()
{
    $unix_time = time();
    return date('m', $unix_time);
}

function t5()
{
    $unix_time = time();
    date_default_timezone_set('Europe/Moscow');
    return date('Y-m-d H:i', $unix_time);
}

function t6()
{
    date_default_timezone_set('Europe/Moscow');
    $startOfDay = strtotime("today", time());
    return strtotime("tomorrow", $startOfDay);
}

function t7($m)
{
    date_default_timezone_set('Europe/Moscow');
    $newDate = mktime(0, 0, 0, $m, 1);
    echo strtotime("tomorrow", $newDate) . '<br>';
}

function t8($t)
{

    $arr = getdate($t);
    if ($arr['wday'] === 0 or $arr['wday'] === 6) {
        return 1;
    } else {
        return 0;
    }
}

function t9($s)
{
//Получаю массив согласно формату даты
    $arrBirthDay = date_parse_from_format('Y M d', $s);
// var_dump($arrBirthDay);

// «шаблон» даты, выдающий unix-формат
    $birthDay = mktime(0, 0, 0, $arrBirthDay['month'], $arrBirthDay['day'], $arrBirthDay['year']);

    //День настоящий
    $today = time();

    //Округляем в меньшую сторону результат вычитания поделенного на 86400 секунд... сутки...
    return floor(($today - $birthDay) / 86400);

}

function t10()
{
    //Настоящий момент
    $now = time();

    //Полное время без текущего года
    $ensOfPreviousYear = mktime(24, 0, 0, 1, 0, 2021);
//    echo $ensOfPreviousYear;

    //Из большего вычетаем меньшее
    $thisYerSeconds = $now - $ensOfPreviousYear;
    echo $thisYerSeconds;


}
