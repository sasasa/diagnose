<?php

namespace Tests\Feature\Services;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\QuestionService;
use App\Models\QuestionTemplate;
use App\Models\ResultTemplate;
use App\Models\Result;
use App\Models\Question;

class QuestionServiceTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    private QuestionService $service;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new QuestionService();
    }
    /**
     * @test
     * @return void
     */
    public function getResult_合致するResultTemplateがないときは例外が出ること()
    {
        $questionTemplate01 = QuestionTemplate::factory()->create();
        $questionTemplate02 = QuestionTemplate::factory()->create();
        $questionTemplate03 = QuestionTemplate::factory()->create();
        $questionTemplate04 = QuestionTemplate::factory()->create();
        $questionTemplate05 = QuestionTemplate::factory()->create();
        $questionTemplate06 = QuestionTemplate::factory()->create();
        $questionTemplate07 = QuestionTemplate::factory()->create();
        $questionTemplate08 = QuestionTemplate::factory()->create();
        $questionTemplate09 = QuestionTemplate::factory()->create();
        $questionTemplate10 = QuestionTemplate::factory()->create();
        $questionTemplate11 = QuestionTemplate::factory()->create();
        $questionTemplate12 = QuestionTemplate::factory()->create();
        $yes_no_01 = $this->faker->numberBetween(0,1);
        $yes_no_02 = $this->faker->numberBetween(0,1);
        $yes_no_03 = $this->faker->numberBetween(0,1);
        $yes_no_04 = $this->faker->numberBetween(0,1);
        $yes_no_05 = $this->faker->numberBetween(0,1);
        $yes_no_06 = $this->faker->numberBetween(0,1);
        $yes_no_07 = $this->faker->numberBetween(0,1);
        $yes_no_08 = $this->faker->numberBetween(0,1);
        $yes_no_09 = $this->faker->numberBetween(0,1);
        $yes_no_10 = $this->faker->numberBetween(0,1);
        $yes_no_11 = $this->faker->numberBetween(0,1);
        $yes_no_12 = $this->faker->numberBetween(0,1);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('数値の範囲のResultTemplateが見つからない');
        $result = $this->service->getResult(array_combine(QuestionTemplate::pluck("id")->toArray(), [
            $yes_no_01,
            $yes_no_02,
            $yes_no_03,
            $yes_no_04,
            $yes_no_05,
            $yes_no_06,
            $yes_no_07,
            $yes_no_08,
            $yes_no_09,
            $yes_no_10,
            $yes_no_11,
            $yes_no_12,
        ]));
    }

    /**
     * @test
     * @return void
     */
    public function getResult_12個Questionが保存されResultオブジェクトを得られること()
    {
        $questionTemplate01 = QuestionTemplate::factory()->create();
        $questionTemplate02 = QuestionTemplate::factory()->create();
        $questionTemplate03 = QuestionTemplate::factory()->create();
        $questionTemplate04 = QuestionTemplate::factory()->create();
        $questionTemplate05 = QuestionTemplate::factory()->create();
        $questionTemplate06 = QuestionTemplate::factory()->create();
        $questionTemplate07 = QuestionTemplate::factory()->create();
        $questionTemplate08 = QuestionTemplate::factory()->create();
        $questionTemplate09 = QuestionTemplate::factory()->create();
        $questionTemplate10 = QuestionTemplate::factory()->create();
        $questionTemplate11 = QuestionTemplate::factory()->create();
        $questionTemplate12 = QuestionTemplate::factory()->create();
        ResultTemplate::factory()->create([
            'min_point' => 0,
            'max_point' => 3,
        ]);
        ResultTemplate::factory()->create([
            'min_point' => 4,
            'max_point' => 6,
        ]);
        ResultTemplate::factory()->create([
            'min_point' => 7,
            'max_point' => 9,
        ]);
        ResultTemplate::factory()->create([
            'min_point' => 10,
            'max_point' => 12,
        ]);
        $yes_no_01 = $this->faker->numberBetween(0,1);
        $yes_no_02 = $this->faker->numberBetween(0,1);
        $yes_no_03 = $this->faker->numberBetween(0,1);
        $yes_no_04 = $this->faker->numberBetween(0,1);
        $yes_no_05 = $this->faker->numberBetween(0,1);
        $yes_no_06 = $this->faker->numberBetween(0,1);
        $yes_no_07 = $this->faker->numberBetween(0,1);
        $yes_no_08 = $this->faker->numberBetween(0,1);
        $yes_no_09 = $this->faker->numberBetween(0,1);
        $yes_no_10 = $this->faker->numberBetween(0,1);
        $yes_no_11 = $this->faker->numberBetween(0,1);
        $yes_no_12 = $this->faker->numberBetween(0,1);
        $result = $this->service->getResult(array_combine(QuestionTemplate::pluck("id")->toArray(), [
            $yes_no_01,
            $yes_no_02,
            $yes_no_03,
            $yes_no_04,
            $yes_no_05,
            $yes_no_06,
            $yes_no_07,
            $yes_no_08,
            $yes_no_09,
            $yes_no_10,
            $yes_no_11,
            $yes_no_12,
        ]));
        $this->assertInstanceOf(Result::class, $result);
        $this->assertSame($yes_no_01+
            $yes_no_02+
            $yes_no_03+
            $yes_no_04+
            $yes_no_05+
            $yes_no_06+
            $yes_no_07+
            $yes_no_08+
            $yes_no_09+
            $yes_no_10+
            $yes_no_11+
            $yes_no_12, $result->point);
        $this->assertDatabaseHas('questions', [
            'question_template_id' => $questionTemplate12->id,
            'point' => $yes_no_12,
        ]);
        $this->assertDatabaseHas('questions', [
            'question_template_id' => $questionTemplate11->id,
            'point' => $yes_no_11,
        ]);
        $this->assertDatabaseHas('questions', [
            'question_template_id' => $questionTemplate10->id,
            'point' => $yes_no_10,
        ]);
        $this->assertDatabaseHas('questions', [
            'question_template_id' => $questionTemplate09->id,
            'point' => $yes_no_09,
        ]);
        $this->assertDatabaseHas('questions', [
            'question_template_id' => $questionTemplate08->id,
            'point' => $yes_no_08,
        ]);
        $this->assertDatabaseHas('questions', [
            'question_template_id' => $questionTemplate07->id,
            'point' => $yes_no_07,
        ]);
        $this->assertDatabaseHas('questions', [
            'question_template_id' => $questionTemplate06->id,
            'point' => $yes_no_06,
        ]);
        $this->assertDatabaseHas('questions', [
            'question_template_id' => $questionTemplate05->id,
            'point' => $yes_no_05,
        ]);
        $this->assertDatabaseHas('questions', [
            'question_template_id' => $questionTemplate04->id,
            'point' => $yes_no_04,
        ]);
        $this->assertDatabaseHas('questions', [
            'question_template_id' => $questionTemplate03->id,
            'point' => $yes_no_03,
        ]);
        $this->assertDatabaseHas('questions', [
            'question_template_id' => $questionTemplate02->id,
            'point' => $yes_no_02,
        ]);
        $this->assertDatabaseHas('questions', [
            'question_template_id' => $questionTemplate01->id,
            'point' => $yes_no_01,
        ]);
    }
}
