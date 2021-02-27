<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Tune;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class TuneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ApiHelper::response('success', Tune::get(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'title' => ['required', 'unique:tunes']
        ]);

        if ($data->fails())
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, 'Validation error', $data->errors());

        $tunes = Tune::create($data->validated());
        return ApiHelper::response('success', $tunes, Response::HTTP_CREATED, 'Tune success created!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$tunes = Tune::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Tune with id: ' . $id . ' not found!');

        return ApiHelper::response('success', $tunes, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$tunes = Tune::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Tune with id: ' . $id . ' not found!');

        $data = Validator::make($request->all(), [
            'title' => ['required', "unique:tunes,title,{$id}"]
        ]);

        if ($data->fails())
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, 'Validation error', $data->errors());

        $tunes->update($data->validated());

        return ApiHelper::response('success', $tunes, Response::HTTP_CREATED, 'Tune success updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$tunes = Tune::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Tune with id: ' . $id . ' not found!');

        if (!$tunes->delete())
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, null, 'Tune can\'t deleted');

        return ApiHelper::response('success', null, Response::HTTP_OK, 'Tune was deleted!');
    }
}
