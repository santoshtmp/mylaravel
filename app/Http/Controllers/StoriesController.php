<?php

namespace App\Http\Controllers;

use App\Models\Stories;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('stories.index');
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
    public function show(Stories $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stories $story)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stories $story)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stories $story)
    {
        //
    }
}
