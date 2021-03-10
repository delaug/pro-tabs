<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Track\StoreTrackRequest;
use App\Http\Requests\Track\UpdateTrackRequest;
use App\Models\Track;
use Illuminate\Http\Response;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ApiHelper::response('success', Track::get(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Track\StoreTrackRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrackRequest $request)
    {
        $track = Track::create($request->validated());

        return ApiHelper::response('success', Track::find($track->id), Response::HTTP_CREATED, 'Track success created!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$track = Track::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Track with id: ' . $id . ' not found!');

        return ApiHelper::response('success', $track, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Track\UpdateTrackRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrackRequest $request, $id)
    {
        if (!$track = Track::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Track with id: ' . $id . ' not found!');

        $track->update($request->validated());

        return ApiHelper::response('success', Track::find($track->id), Response::HTTP_CREATED, 'Track success updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Http\Requests\Track\DestroyTrackRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyTrackRequest $request, $id)
    {
        if (!$track = Track::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Track with id: ' . $id . ' not found!');

        if (!$track->delete())
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, null, 'Track can\'t deleted');

        return ApiHelper::response('success', null, Response::HTTP_OK, 'Track was deleted!');
    }
}
