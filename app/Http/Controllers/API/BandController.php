<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Band\DestroyBandRequest;
use App\Http\Requests\Band\StoreBandRequest;
use App\Http\Requests\Band\UpdateBandRequest;
use App\Models\Band;
use Symfony\Component\HttpFoundation\Response;


class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ApiHelper::response('success', Band::get(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Band\StoreBandRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBandRequest $request)
    {
        $band = Band::create($request->validated());
        return ApiHelper::response('success', $band, Response::HTTP_CREATED, 'Band success created!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$band = Band::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Band with id: ' . $id . ' not found!');

        return ApiHelper::response('success', $band, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Band\UpdateBandRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBandRequest $request, $id)
    {
        if (!$band = Band::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Band with id: ' . $id . ' not found!');

        $band->update($request->validated());

        return ApiHelper::response('success', $band, Response::HTTP_CREATED, 'Band success updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Http\Requests\Band\DestroyBandRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyBandRequest $request, $id)
    {
        if (!$instrument = Band::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Band with id: ' . $id . ' not found!');

        if (!$instrument->delete())
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, null, 'Band can\'t deleted');

        return ApiHelper::response('success', null, Response::HTTP_OK, 'Band was deleted!');
    }
}
