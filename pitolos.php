<?php

$log = "23:49:08.277 038 – F.MASSA 1 1:02.852 44,275
23:49:10.858 033 – R.BARRICHELLO 1 1:04.352 43,243
23:49:11.075 002 – K.RAIKKONEN 1 1:04.108 43,408
23:49:12.667 023 – M.WEBBER 1 1:04.414 43,202
23:49:30.976 015 – F.ALONSO 1 1:18.456 35,47
23:50:11.447 038 – F.MASSA 2 1:03.170 44,053
23:50:14.860 033 – R.BARRICHELLO 2 1:04.002 43,48
23:50:15.057 002 – K.RAIKKONEN 2 1:03.982 43,493
23:50:17.472 023 – M.WEBBER 2 1:04.805 42,941
23:50:37.987 015 – F.ALONSO 2 1:07.011 41,528
23:51:14.216 038 – F.MASSA 3 1:02.769 44,334
23:51:18.576 033 – R.BARRICHELLO 3 1:03.716 43,675
23:51:19.044 002 – K.RAIKKONEN 3 1:03.987 43,49
23:51:21.759 023 – M.WEBBER 3 1:04.287 43,287
23:51:46.691 015 – F.ALONSO 3 1:08.704 40,504
23:52:01.796 011 – S.VETTEL 1 3:31.315 13,169
23:52:17.003 038 – F.MASSA 4 1:02.787 44,321
23:52:22.586 033 – R.BARRICHELLO 4 1:04.010 43,474
23:52:22.120 002 – K.RAIKKONEN 4 1:03.076 44,118
23:52:25.975 023 – M.WEBBER 4 1:04.216 43,335
23:53:06.741 015 – F.ALONSO 4 1:20.050 34,763
23:53:39.660 011 – S.VETTEL 2 1:37.864 28,435
23:54:57.757 011 – S.VETTEL 3 1:18.097 35,633";

$lines = explode("\n", $log);

$raceResults = array();
foreach ($lines as $line) {
    $data = explode(" ", $line);
    $time = $data[0];
    $code = trim($data[1], "–");
    $name = $data[3];
    $lap = (int)$data[4];
    $lapTime = $data[5];
    $averageSpeed = $data[6];

    if (!isset($raceResults[$code])) {
        $raceResults[$code] = array(
            'name' => $name,
            'laps' => 0,
            'totalTime' => 0,
        );
    }

    $raceResults[$code]['laps'] += $lap;
    $lapTimeInSeconds = convertLapTimeToSeconds($lapTime);
    $raceResults[$code]['totalTime'] += $lapTimeInSeconds;
}

// Ordenar os resultados pela menor quantidade de voltas e tempo total
usort($raceResults, function ($a, $b) {
    if ($a['laps'] == $b['laps']) {
        return $a['totalTime'] <=> $b['totalTime'];
    }
    return $a['laps'] <=> $b['laps'];
});

// Função para converter tempo de volta no formato mm:ss.sss para segundos
function convertLapTimeToSeconds($lapTime)
{
    $timeParts = explode(":", $lapTime);
    $minutes = (int)$timeParts[0];
    $seconds = (float)$timeParts[1];
    return $minutes * 60 + $seconds;
}

// Função para formatar o tempo para o formato mm:ss.sss
function formatTime($timeInSeconds)
{
    $minutes = floor($timeInSeconds / 60);
    $seconds = $timeInSeconds - $minutes * 60;
    return sprintf("%02d:%06.3f", $minutes, $seconds);
}

?>
