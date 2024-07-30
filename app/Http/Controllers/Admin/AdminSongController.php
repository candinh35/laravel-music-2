<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;
use App\Models\Song;
use App\Services\AlbumService;
use App\Services\CategoryService;
use App\Services\SingerService;
use App\Services\SongService;
use Exception;
use Illuminate\Http\Request;

class AdminSongController extends Controller
{
    private $songService;
    private $singerService;
    private $albumService;
    private $categoryService;

    public function __construct(
        SongService $songService,
        SingerService $singerService,
        AlbumService $albumService,
        CategoryService $categoryService
    ) {
        $this->songService = $songService;
        $this->singerService = $singerService;
        $this->albumService = $albumService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $songs = $this->songService->getPaginateFilterByName($limit = PER_PAGE_OPTION_ONE, ['singer', 'album', 'category'], trim($request->query('filter')));

        return view('admin.song', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('songs.store');

        $singers = $this->singerService->getAll();

        $albums = $this->albumService->getAll();

        $categories = $this->categoryService->getAll();
        //
        return view('admin.song_create_update', compact('action', 'singers', 'albums', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSongRequest $request)
    {
        //
        try {
            $this->songService->createWithFile($request->all());
            return back()->with('success', __('messages.create_success', ['attribute' => 'song']));
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Song  $Song
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
     * @param  \App\Models\Song  $Song
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // call service get by id
        $song = $this->songService->getById($id);

        $action = route('songs.update', ['song' => $id]);

        $singers = $this->singerService->getAll();

        $albums = $this->albumService->getAll();

        $categories = $this->categoryService->getAll();

        return view('admin.song_create_update', compact('song', 'action', 'singers', 'albums', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Song  $Song
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSongRequest $request, $id)
    {
        //
        try {
            $this->songService->updateWithFile($request->all(), $id);
            return redirect()->route('songs.index')->with('success', __('messages.update_success', ['attribute' => 'song']));
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $Song
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $this->songService->deleteSong($id);
            return redirect()->route('songs.index')->with('success', __('messages.delete_success', ['attribute' => 'song']));
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }
}
