<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\TestResults;
use Illuminate\Http\Request;

class TestResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin/results/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestResults  $testResults
     * @return \Illuminate\Http\Response
     */
    public function show(TestResults $testResults)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestResults  $testResults
     * @return \Illuminate\Http\Response
     */
    public function edit(TestResults $testResults)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestResults  $testResults
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestResults $testResults)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestResults  $testResults
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestResults $testResults)
    {
        //
    }
}
