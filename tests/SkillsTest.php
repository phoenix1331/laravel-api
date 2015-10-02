<?php

class SkillsTest extends ApiTester {
    /** @test */
    public function it_fetches_skills()
    {
        $this->makeSkill();
        $this->getJson('api/v1/skills');
        $this->assertResponseOk();
    }
    /** @test */
    public function it_fetches_a_single_skill()
    {
        $this->makeSkill();
        $skill = $this->getJson('api/v1/skills/1')->data;
        $this->assertResponseOk();
        $this->assertObjectHasAttributes($skill, 'name');
    }
    /** @test */
    public function it_404s_if_a_skill_is_not_found()
    {
        $this->getJson('api/v1/skills/x');
        $this->assertResponseStatus(404);
    }
    private function makeSkill($skillField = [])
    {
        $skill = array_merge([
            'name' => $this->fake->name()
        ], $skillField);
        while($this->times--) App\Skill::create($skill);
    }
}