<?php

namespace App\Http\Controllers\Parse;

use App\Domain\Parse\Actions\ParseAction;
use App\Domain\Parse\DTO\ParseData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dummy\ParseDummyRequest;

class ParseController extends Controller
{
    /**
     * @param ParseDummyRequest $request
     * @return void
     */
    public function parseDummy(ParseDummyRequest $request): void
    {
        try {
            (new ParseAction())->parseAction(
                new ParseData($request->get('model'), $request->get('keyword'))
            );
        } catch (\Throwable $th) {
            \Log::debug($th->getMessage() . "\n" . $th->getFile() . ":" . $th->getLine() . "\n" . $th->getTraceAsString());
        }
    }
}
