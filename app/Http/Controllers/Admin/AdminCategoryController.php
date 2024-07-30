<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Constants\Constant;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class AdminCategoryController extends Controller
{

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
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
        $categories = $this->categoryService->getPaginateFilterByName($limit = PER_PAGE_OPTION_ONE, null, trim($request->query('filter')));

        return view('admin.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('categories.store');
        //
        return view('admin.category_create_update', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        // $validatedData = $request->validated();
        try {
            $this->categoryService->create($request->all());
            return back()->with('success', __('messages.create_success', ['attribute' => 'category']));
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // call service get by id
        $category = $this->categoryService->getById($id);

        $action = route('categories.update', ['category' => $id]);

        return view('admin.category_create_update', compact('category', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        //
        try {
            $this->categoryService->update($request->all(), $id);
            return redirect()->route('categories.index')->with('success', __('messages.update_success', ['attribute' => 'category']));
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {

            $this->categoryService->delete($id);
            return redirect()->route('categories.index')->with('success', __('messages.delete_success', ['attribute' => 'category']));
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }
}
