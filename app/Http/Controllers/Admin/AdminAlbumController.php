<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Album;
use App\Services\AlbumService;
use App\Services\SingerService;
use Exception;
use Illuminate\Http\Request;

class AdminAlbumController extends Controller
{
    protected $albumService;
    protected $singerService;

    public function __construct(AlbumService $albumService, SingerService $singerService)
    {
        $this->albumService = $albumService;
        $this->singerService = $singerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $albums = $this->albumService->getPaginateFilterByName($limit = PER_PAGE_OPTION_ONE, 'singer',trim($request->query('filter')));

        return view('admin.album', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('albums.store');

        $singers = $this->singerService->getAll();
        //
        return view('admin.album_create_update', compact('action', 'singers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbumRequest $request)
    {
        //
        try {
            $this->albumService->createWithFile($request->all());
            return back()->with('success', __('messages.create_success', ['attribute' => 'album']));
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $Album
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        abort(400);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $Album
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // call service get by id
        $album = $this->albumService->getById($id);

        $singers = $this->singerService->getAll();

        $action = route('albums.update', ['album' => $id]);

        return view('admin.album_create_update', compact('album', 'singers', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $Album
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlbumRequest $request, $id)
    {
        //
        try {
            $this->albumService->updateWithFile($request->all(), $id);
            return redirect()->route('albums.index')->with('success', __('messages.update_success', ['attribute' => 'album']));
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $Album
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $this->albumService->deleteAlbum($id);
            return redirect()->route('albums.index')->with('success', __('messages.delete_success', ['attribute' => 'album']));
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }
}
