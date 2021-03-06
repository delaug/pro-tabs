<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tab\DestroyTabRequest;
use App\Http\Requests\Tab\StoreTabRequest;
use App\Http\Requests\Tab\UpdateTabRequest;
use App\Models\Tab;
use App\Services\FilesFacade;
use App\Services\FilesService;
use Illuminate\Http\Response;

class TabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ApiHelper::response('success', Tab::with(['band','file','tracks'])->get(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Tab\StoreTabRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTabRequest $request)
    {
        $tab = Tab::create($request->validated());

        // Set File
        $src = FilesFacade::move($request->src, $tab->id);
        if (in_array($src, [FilesService::ERR_TMP_FILE_NOT_FOUND, FilesService::ERR_TAB_FILE_EXIST, FilesService::ERR_CANT_MOVE]))
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, 'File move error', FilesFacade::getErrorText($src));
        else
            $tab->update(['src' => $src]);

        return ApiHelper::response('success', Tab::with(['band','file','tracks'])->find($tab->id), Response::HTTP_CREATED, 'Tab success created!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$tab = Tab::with(['band','file','tracks'])->find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Tab with id: ' . $id . ' not found!');

        return ApiHelper::response('success', $tab, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Tab\UpdateTabRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTabRequest $request, $id)
    {
        if (!$tab = Tab::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Tab with id: ' . $id . ' not found!');

        $tab->update($request->validated());

        // Set file
        $src = FilesFacade::move($request->src, $tab->id, true);
        if (in_array($src, [FilesService::ERR_TMP_FILE_NOT_FOUND, FilesService::ERR_TAB_FILE_EXIST, FilesService::ERR_CANT_MOVE]))
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, 'File move error', FilesFacade::getErrorText($src));
        else
            $tab->update(['src' => $src]);

        return ApiHelper::response('success', Tab::with(['band','file','tracks'])->find($tab->id), Response::HTTP_CREATED, 'Tab success updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Http\Requests\Tab\DestroyTabRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyTabRequest $request, $id)
    {
        if (!$tab = Tab::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Tab with id: ' . $id . ' not found!');

        if (!$tab->delete())
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, null, 'Tab can\'t deleted');

        return ApiHelper::response('success', null, Response::HTTP_OK, 'Tab was deleted!');
    }
}
