<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Job;
use Response;
use App\Http\Controllers\Controller;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();
        return Response::json([
                'data' => $this->transformCollection($jobs)
            ], 200);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobs = Job::find($id);

        if(!$jobs){
            return Response::json([

                'error' => [
                    'message' => 'Job does not exist',
                    'code' => 404
                ]

            ], 404);
        }

        return Response::json([

                'data' => $this->transform($jobs)

            ], 200);
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

    /**
     * Transforms a collection
     * @param  [type] $jobs [description]
     * @return [type]       [description]
     */
    private function transformCollection($jobs){

        return array_map([$this, 'transform'], $jobs->toArray());

    }

    /**
     * Transforms a single 
     * @param  [type] $job [description]
     * @return [type]      [description]
     */
    private function transform($job){

        return [

            'name' => $job['name'],
            'description' => $job['description']

        ];
    }
}
