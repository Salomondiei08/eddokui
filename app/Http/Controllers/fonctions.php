<?php


use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Console\View\Components\Alert;

function devise($montant)
{
    return number_format($montant, 0, '.', ' ').' Fcfa';
}

function millier($montant)
{
    return number_format($montant, 0, '.', ' ');
}

//Mettre la une classe active
function active($i, $class)
{
    return ($i == 0) ? $class : null ;
}
