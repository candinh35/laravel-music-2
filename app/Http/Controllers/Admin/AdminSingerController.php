<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreSingerRequest;
use App\Http\Requests\UpdateSingerRequest;
use App\Models\Singer;
use App\Services\SingerService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

class AdminSingerController extends Controller
{

    protected $singerService;

    public function __construct(SingerService $singerService)
    {
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
        $singers = $this->singerService->getPaginateFilterByName($limit = PER_PAGE_OPTION_ONE, null, trim($request->query('filter')));
        $singers->appends(['sort' => 'votes']);

        return view('admin.singer', compact('singers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $action = route('singers.store');
        //
        return view('admin.singer_create_update', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSingerRequest $request)
    {
        // $validatedData = $request->validated();
        try {
            $this->singerService->createWithFile($request->all());
            return redirect()->route('singers.create')->with('success', __('messages.create_success', ['attribute' => 'singer']));
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Singer  $singer
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
     * @param  \App\Models\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // call service get by id
        $singer = $this->singerService->getById($id);

        $action = route('singers.update', ['singer' => $id]);

        return view('admin.singer_create_update', compact('singer', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSingerRequest $request, $id)
    {
        //
        try {
            $this->singerService->updateWithFile($request->all(), $id);
            return redirect()->route('singers.index')->with('success', __('messages.update_success', ['attribute' => 'singer']));
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $this->singerService->deleteSinger($id);
            return redirect()->route('singers.index')->with('success', __('messages.delete_success', ['attribute' => 'category']));
        } catch (\Illuminate\Database\QueryException $e) {
            if (Str::contains($e->getMessage(), 'SQLSTATE[23000]: Integrity constraint violation')) {
                return back()->withErrors(['error' => __('messages.delete_singer_error_constraint')]);
            } else {
                abort(500);
            }
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }
}
