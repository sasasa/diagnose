<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use App\Models\QuestionTemplate;
use App\Models\Result;
use App\Models\ResultTemplate;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class QuestionService
{
    public function getResult(array $questions): Result
    {
        try {
            DB::beginTransaction();
            $user = User::factory()->create();
            $pointAll = 0;
            foreach ($questions as $question_template_id => $point) {
                $pointAll += intval($point);
                Question::create([
                    'question_template_id' => $question_template_id,
                    'point' => $point,
                    'user_id' => $user->id,
                ]);
            }
            $resultTemplate = ResultTemplate::query()->where('min_point', '<=', $pointAll)->where('max_point', '>=', $pointAll)->first();
            if(!$resultTemplate) {
                throw new \Exception('数値の範囲のResultTemplateが見つからない');
            }
            $result = Result::create([
                'point' => $pointAll,
                'user_id' => $user->id,
                'result_template_id' => $resultTemplate->id,
            ]);
            DB::commit();
            return $result;
        } catch (\Throwable $e) {
            Log::critical(__METHOD__.':'.__LINE__.':'. $e->getMessage());
            DB::rollBack();
            throw $e;
        }
    }
}