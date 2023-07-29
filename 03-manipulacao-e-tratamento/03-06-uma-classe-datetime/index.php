<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.06 - Uma classe DateTime");

/*
 * [ DateTime ] http://php.net/manual/en/class.datetime.php
 */
fullStackPHPClassSession("A classe DateTime", __LINE__);
    define("DATE_BR", "d/m/Y H:i:s");
    $dateNow = new DateTime();

    $dateBirth = new DateTime("1993-04-13");

    $dateStatic = DateTime::createFromFormat(DATE_BR, "13/04/1993 00:00:00");

    var_dump($dateNow, $dateBirth, $dateStatic);

    var_dump([
        $dateNow->format(DATE_BR),
        $dateNow->format("d"),
    ]);

    echo "<p>Hoje é dia {$dateNow->format("d")} do {$dateNow->format("m")} de {$dateNow->format("Y")} </p>";

    $newTimeZone = new DateTimeZone("Pacific/Apia");
    $newDateTime = new DateTime("now", $newTimeZone);

    var_dump([
        $newTimeZone,
        $newDateTime,
        $dateNow
    ]);

/*
 * [ DateInterval ] http://php.net/manual/en/class.dateinterval.php
 * [ interval_spec ] http://php.net/manual/en/dateinterval.construct.php
 */
fullStackPHPClassSession("A classe DateInterval", __LINE__);

$dateInterval = new DateInterval("P10Y2MT10M");

var_dump($dateInterval);

$dateTime = new DateTime("now");
//$dateTime->add($dateInterval);
$dateTime->sub($dateInterval);

var_dump($dateTime);

$birth = new DateTime(date("Y") . "-04-13");
$now = new DateTime("now");
$diff = $now->diff($birth);

var_dump([
    $birth->format(DATE_BR),
    $dateTime->format(DATE_BR),
    $birth->diff($dateTime)
]);

if($diff->invert){
    echo "<p>Seu aniversário foi há {$diff->days} dias.</p>";
}else{
    echo "<p>Faltam {$diff->days} dias para seu aniversário.</p>";
}

$dateResources = new DateTime("now");

var_dump([
    $dateResources->format(DATE_BR),
    $dateResources->sub(DateInterval::createFromDateString("10days"))->format(DATE_BR),
    $dateResources->add(DateInterval::createFromDateString("20days"))->format(DATE_BR),
]);


/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
fullStackPHPClassSession("A classe DatePeriod", __LINE__);

$startDate = new DateTime("now");
$interval = new DateInterval("P1M");
$endDate = new DateTime("2025-01-01");

$period = new DatePeriod($startDate, $interval, $endDate);

var_dump([
    $startDate->format(DATE_BR),
    $interval,
    $endDate->format(DATE_BR),
    $period,
    get_class_methods($period),
]);

echo "<h1>Sua assinatura:</h1>";
foreach ($period as $recurrences){
    echo "<p>Próximo vencimento {$recurrences->format(DATE_BR)}</p>";
}

