<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Skill;
use App\Job;
use \App\Transformers\SkillsTransformer;
use Response;
use App\Http\Controllers\Controller;

class SkillsController extends ApiController
{
    protected $skillsTransformer;

    /**
     * [__construct description]
     * @param SkillsTransformer $skillsTransformer [description]
     */
    function __construct(SkillsTransformer $skillsTransformer){

        $this->skillsTransformer = $skillsTransformer;

        // $this->beforeFilter('auth.basic');
        $this->middleware('auth.basic', ['only' => 'store']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($jobId = null)
    {
        $skills = $this->getSkills($jobId);
        return $this->respond([

            'data' => $this->skillsTransformer->transformCollection($skills->toArray())

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
      $skills = Skill::find($id);

      if(!$skills){

          return $this->respondNotFount('No skills here dude !');

      }

      return $this->respond([

          'data' => $this->skillsTransformer->transform($skills)

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

    public function getSkills($jobId){

        return $jobId ? Job::findOrFail($jobId)->skills : Skill::all();

    }
}
