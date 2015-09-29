<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Job;
use \App\Transformers\JobsTransformer;
use Response;
use App\Http\Controllers\Controller;

class JobsController extends ApiController
{

    protected $jobsTransformer;

    /**
     * [__construct description]
     * @param JobsTransformer $jobsTransformer [description]
     */
    function __construct(JobsTransformer $jobsTransformer){

        $this->jobsTransformer = $jobsTransformer;

        // $this->beforeFilter('auth.basic');
        $this->middleware('auth.basic', ['only' => 'store']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();
        return $this->respond([

                'data' => $this->jobsTransformer->transformCollection($jobs->toArray())

            ]);
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
        dd('store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobs = Job::find($id);

        if(!$jobs){

            return $this->respondNotFount('No jobs here dude !');

        }

        return $this->respond([

                'data' => $this->jobsTransformer->transform($jobs)

            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
