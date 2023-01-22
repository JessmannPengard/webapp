<?php

function format_interval_dates($dateFrom, $dateTo)
{
    $interval = $dateFrom->diff($dateTo);

    $result = "";
    if ($interval->y) {
        $result .= $interval->format("%y years ");
    }
    if ($interval->m) {
        $result .= $interval->format("%m months ");
    }
    if ($interval->d) {
        $result .= $interval->format("%d days ");
    }
    if ($interval->h) {
        $result .= $interval->format("%h hours ");
    }
    if ($interval->i) {
        $result .= $interval->format("%i minutes ");
    }
    if ($interval->s) {
        $result .= $interval->format("%s seconds ");
    }

    return $result;
}

function format_interval_dates_short($dateFrom, $dateTo)
{
    $interval = $dateFrom->diff($dateTo);

    $result = "";
    if ($interval->y) {
        return $interval->format("%yY");
    }
    if ($interval->m) {
        return $interval->format("%mM");
    }
    if ($interval->d) {
        return $interval->format("%dD");
    }
    if ($interval->h) {
        return $interval->format("%hH");
    }
    if ($interval->i) {
        return $interval->format("%im");
    }
    if ($interval->s) {
        return $interval->format("%ss");
    }
}