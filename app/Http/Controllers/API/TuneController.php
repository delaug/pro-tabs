<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tune\DestroyTuneRequest;
use App\Http\Requests\Tune\StoreTuneRequest;
use App\Http\Requests\Tune\UpdateTuneRequest;
use App\Models\Tune;
use Illuminate\Http\Response;

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
     * @param \App\Http\Requests\Tune\StoreTuneRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTuneRequest $request)
    {
       $tunes = Tune::create($request->validated());
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
     * @param \App\Http\Requests\Tune\UpdateTuneRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTuneRequest $request, $id)
    {
        if (!$tunes = Tune::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Tune with id: ' . $id . ' not found!');

        $tunes->update($request->validated());

        return ApiHelper::response('success', $tunes, Response::HTTP_CREATED, 'Tune success updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Http\Requests\Tune\DestroyTuneRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyTuneRequest $request, $id)
    {
        if (!$tunes = Tune::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Tune with id: ' . $id . ' not found!');

        if (!$tunes->delete())
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, null, 'Tune can\'t deleted');

        return ApiHelper::response('success', null, Response::HTTP_OK, 'Tune was deleted!');
    }
}
