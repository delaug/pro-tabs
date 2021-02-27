<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Instrument;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'title' => ['required', 'unique:instruments']
        ]);

        if ($data->fails())
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, 'Validation error', $data->errors());

        $instrument = Instrument::create($data->validated());
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
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$instrument = Instrument::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Instrument with id: ' . $id . ' not found!');

        $data = Validator::make($request->all(), [
            'title' => ['required', "unique:instruments,title,{$id}"]
        ]);

        if ($data->fails())
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, 'Validation error', $data->errors());

        $instrument->update($data->validated());

        return ApiHelper::response('success', $instrument, Response::HTTP_CREATED, 'Instrument success updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$instrument = Instrument::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Instrument with id: ' . $id . ' not found!');

        if (!$instrument->delete())
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, null, 'Instrument can\'t deleted');

        return ApiHelper::response('success', null, Response::HTTP_OK, 'Instrument was deleted!');
    }
}
