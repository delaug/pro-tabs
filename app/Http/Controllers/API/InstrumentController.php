<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Instrument\DestroyInstrumentRequest;
use App\Http\Requests\Instrument\StoreInstrumentRequest;
use App\Http\Requests\Instrument\UpdateInstrumentRequest;
use App\Models\Instrument;
use Illuminate\Http\Response;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ApiHelper::response('success', Instrument::get(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Instrument\StoreInstrumentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstrumentRequest $request)
    {
        $instrument = Instrument::create($request->validated());
        return ApiHelper::response('success', $instrument, Response::HTTP_CREATED, 'Instrument success created!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$instrument = Instrument::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Instrument with id: ' . $id . ' not found!');

        return ApiHelper::response('success', $instrument, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Instrument\UpdateInstrumentRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstrumentRequest $request, $id)
    {
        if (!$instrument = Instrument::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Instrument with id: ' . $id . ' not found!');

        $instrument->update($request->validated());

        return ApiHelper::response('success', $instrument, Response::HTTP_CREATED, 'Instrument success updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Http\Requests\Instrument\DestroyInstrumentRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyInstrumentRequest $request, $id)
    {
        if (!$instrument = Instrument::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Instrument with id: ' . $id . ' not found!');

        if (!$instrument->delete())
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, null, 'Instrument can\'t deleted');

        return ApiHelper::response('success', null, Response::HTTP_OK, 'Instrument was deleted!');
    }
}
