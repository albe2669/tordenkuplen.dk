<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Requests
use App\Http\Requests\API\Random\GroupRequest;
use App\Http\Requests\API\Random\ListRequest;
use App\Http\Requests\API\Random\NumberRequest;
use App\Http\Requests\API\Random\ElementRequest;
use Illuminate\Support\Facades\Log;


class RandomController extends Controller
{
    private function formatAsObject($a) {
        $obj = array();

        for ($i = 0; $i < count($a); $i++) {
            $orObj = $a[$i];

            $obj[] = [
                "id" => $i,
                "data" => $orObj
            ];
        }

        return $obj;
    }
    private function getRandomNumber($min, $max) {
        return random_int($min, $max);
    }

    private function swap($arr, $a, $b) {
        $tmp = $arr[$a];
        $arr[$a] = $arr[$b];
        $arr[$b] = $tmp;

        return $arr;
    }

    private function shuffleArray($arr) {
        $i = count($arr)-1;
        for (; $i > 0; $i--) {
            $j = $this->getRandomNumber(0, $i);

            $arr = $this->swap($arr, $i, $j);
        }

        return $arr;
    }

    public function number(NumberRequest $request) {
        $args = $request->validated();

        return response()->json([
            'message' => 'Success',
            'result' => $this->getRandomNumber($args['min'], $args['max'])
        ], 200);
    }

    public function list(ListRequest $request) {
        $list = $request->validated()['list'];
        $list = $this->formatAsObject($list);

        return response()->json([
            'message' => 'Success',
            'result' => $this->shuffleArray($list)
        ], 200);
    }

    public function group(GroupRequest $request) {
        $list = $request->validated()['list'];
        $size = $request->validated()['size'];
        $strict = $request->validated()['strict'];

        $groups = array();
        $list = $this->shuffleArray($list);

        $i = 0;
        while(true) {
            $slice = array_slice($list, $i, $size);

            array_push($groups, $this->formatAsObject($slice));
            $i += $size;
            if (count($slice) < $size || $i > count($list)-1) {
                break;
            }
        }

        if ($strict) {
            if (count($groups[count($groups)-1]) / $size < 0.75) {
                $i = 0;
                $remove = $groups[count($groups)-1];
                array_pop($groups);

                while(true) {
                    Log::debug($groups[$i]);
                    $groups[$i][] = $remove[0];
                    array_shift($remove);

                    Log::debug($groups[$i]);

                    if (count($remove) < 1) {
                        break;
                    }

                    $i += 1;
                    if ($i >= count($groups)) {
                        $i = 0;
                    }
                }
            }
        }

        return response()->json([
            'message' => 'Success',
            'result' => $this->formatAsObject($groups)
        ], 200);
    }

    public function element(ElementRequest $request) {
        $list = $request->validated()['list'];
        $list = $this->formatAsObject($list);

        return response()->json([
            'message' => 'Success',
            'result' => $list[$this->getRandomNumber(0, count($list)-1)]
        ], 200);
    }

}
