<?php

namespace App\Http\Controllers\Spinach;

// use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\MyController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Sentence;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class indexController extends MyController
{
    public function getSentenceList(Request $request, $limit = 10)
    {
        // ajax response info
        $result = [
            'result' => false,
            'message' => null,
            'errors' => [],
            'response_data' => null,
        ];

        try {
            DB::enableQueryLog();
            // $clinics = Clinic::all();
            // $clinics = Clinic::where('delete_flag', DELETE_FLAG_OFF);
            $sentences = Sentence::where('del_flg', 0)
                ->pluck('ja_sentence')
                ->toArray();
            // Log::debug('クリニック一覧所得 SQLログ');
            // dump($clinics);
            // var_dump($clinics);
            // dd($clinics);
            // SQLログ出力
            // Log::debug(DB::getQueryLog());
            if (empty($sentences)) {
                $result['message'] = 'センテンスの一覧所得に失敗しました。';
                $result['errors'] = [];
                $result['response_data'] = $sentences;
                return response()->json($result, Response::HTTP_OK);
            } else {
                $result['result'] = true;
                $result['message'] = 'センテンスの一覧所得に成功しました。';
                $result['response_data'] = $sentences;
            }
            Log::debug('検索に成功しました。');

            return response()->json($result, Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::debug('センテンス一覧所得での不具合');
            Log::debug(DB::getQueryLog());
            Log::error($e);
            $result['message'] = '予期せぬエラーが発生しました。';
            $result['errors'] = [];
            $result['response_data'] = [];
            return response()->json($result, Response::HTTP_BAD_GATEWAY);
        }
    }
}
