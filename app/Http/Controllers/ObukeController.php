<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObukeController extends Controller
{
    public function index($date)
    {
        echo json_encode(['a' => $date]);
    }
}
