<?php

class LessonsTest extends ApiTester {
    /** @test */
    public function it_fetches_lessons()
    {
        $this->makeJob();
        $this->getJson('api/v1/jobs');
        $this->assertResponseOk();
    }
    /** @test */
    public function it_fetches_a_single_lesson()
    {
        $this->makeJob();
        $job = $this->getJson('api/v1/jobs/1')->data;
        $this->assertResponseOk();
        $this->assertObjectHasAttributes($job, 'name', 'description');
    }
    /** @test */
    public function it_404s_if_a_job_is_not_found()
    {
        $this->getJson('api/v1/jobs/x');
        $this->assertResponseStatus(404);
    }
    private function makeJob($jobFields = [])
    {
        $job = array_merge([
            'name' => $this->fake->name(),
            'description'  => $this->fake->paragraph(5)
        ], $jobFields);
        while($this->times--) App\Job::create($job);
    }
}