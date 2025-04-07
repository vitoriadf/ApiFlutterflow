<?php

namespace App\Http\Controllers;

use App\Models\Tecido;
use Illuminate\Http\Request;

class TecidoController extends Controller
{
    public readonly Tecido $tecido;

    public function __construct(){
        $this->tecido = new Tecido();
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}