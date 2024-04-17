<?php
function loadFile($fichier)
{
    $rows = array_map('str_getcsv', file($fichier));
    $header = array_shift($rows);
    $data = array();
    foreach ($rows as $row) {
        $data[] = array_combine($header, $row);
    }
    return $data;
}

function savefile($fichier, $data)
{
    $fp = fopen($fichier, 'w');
    fputcsv($fp, array_keys(current($data)));
    foreach ($data as $fields) {
        fputcsv($fp, $fields);
    }
    fclose($fp);
}

