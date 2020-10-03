<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObukeController extends Controller
{
    public function index($date)
    {
        echo json_encode(['a' => $date]);
    }

    public function show($date)
    {
        echo json_encode(['a' => $date]);
    }

    public function create($date)
    {
        echo json_encode(['a' => $date]);
    }

    public function edit($date)
    {
        echo json_encode(['a' => $date]);
    }

    public function update($date)
    {
        echo json_encode(['a' => $date]);
    }

    public function store($date)
    {
        echo json_encode(['a' => $date]);
    }

    public function delete($date)
    {
        echo json_encode(['a' => $date]);
    }
}
