<?php

namespace App\Http\Controllers\Core;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function __construct()
    {
        //
    }
    public function testTest()
    {
        echo 'Use testTest';
        exit();
    }
    public function var_dump($value)
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
    }
    public function var_dump_e($value)
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
        exit();
    }
}
