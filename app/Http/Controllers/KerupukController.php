<?php

namespace App\Http\Controllers;

use App\Models\Kerupuk;
use Illuminate\Http\Request;

class KerupukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kerupuk = Kerupuk::get();
        return view('user.index', compact('kerupuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kerupuk $kerupuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kerupuk $kerupuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kerupuk $kerupuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kerupuk $kerupuk)
    {
        //
    }
}
