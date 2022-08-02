<?php

use Morilog\Jalali\Jalalian;

function jalaliAgo($date)
{
//    return Jalalian::forge(Carbon\Carbon::parse($date)->diffInDays())->ago();
    return Jalalian::fromDateTime(Carbon\Carbon::parse($date))->ago();
}

function jalaliDate($date, $format='%D %B %Y')
{
    return Jalalian::forge($date)->format($format);
}