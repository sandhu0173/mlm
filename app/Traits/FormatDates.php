<?php
namespace App\Traits;
use Carbon\Carbon;
trait FormatDates
{
    function getCreatedAtAttribute($value)
    {
        
        return  Carbon::parse($value)->format('m/d/Y');
        
       // return date("m/d/Y",strtotime($value));
    }
}
?>