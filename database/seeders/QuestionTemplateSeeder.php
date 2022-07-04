<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_templates')->insert([
            [
                'content' => '⾃⼰PRが得意だ',
            ],
            [
                'content' => '⾃分の世界に閉じこもって周りが⾒えなくなることが多い',
            ],
            [
                'content' => '⼈に話しかけるのが苦⼿だ',
            ],
            [
                'content' => '困ってる⼈には⾃分から声をかけて助ける',
            ],
            [
                'content' => '考えがまとまってから話す事が多い',
            ],
            [
                'content' => '１⼈でご飯を⾷べるのは苦⼿だ',
            ],
            [
                'content' => '相談をうけたら共感するより解決策を考えるべきだ',
            ],
            [
                'content' => '⼈を信じるまでは慎重になるほうだ',
            ],
            [
                'content' => '話す時はうなづいて同意することが多い',
            ],
            [
                'content' => '流⾏り物には⾶びつくほうだ',
            ],
            [
                'content' => '相⼿に同情するとなんでも許せてしまう',
            ],
            [
                'content' => '論理的に課題を解決するのが得意だ',
            ],
        ]);
    }
}
