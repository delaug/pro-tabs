<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Band;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;


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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'name' => ['min:4', 'unique:bands']
        ]);

        if ($data->fails())
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, 'Validation error', $data->errors());

        $band = Band::create($data->validated());
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
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$band = Band::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Band with id: ' . $id . ' not found!');

        $data = Validator::make($request->all(), [
            'name' => ['min:4', "unique:bands,name,{$id}"]
        ]);

        if ($data->fails())
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, 'Validation error', $data->errors());

        $band->update($data->validated());

        return ApiHelper::response('success', $band, Response::HTTP_CREATED, 'Band success updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$band = Band::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Band with id: ' . $id . ' not found!');

        if (!$band->delete())
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Band can\'t deleted');

        return ApiHelper::response('success', null, Response::HTTP_OK, 'Band was deleted!');
    }
}
