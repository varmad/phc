<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// use Illuminate\View\View;
// use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\NurseCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\NurseCategory;
use Yajra\Datatables\Datatables;

class NurseCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $nurse_categories = NurseCategory::paginate();

      return view('admin.nurse_categories.index', compact('nurse_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      return view('admin.nurse_categories.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NurseCategory $nurse_category)
    {
      return view('admin.nurse_categories.edit', compact('nurse_category'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NurseCategoryRequest $request)
    {

      $nurse_category = NurseCategory::create($request->only(['name', 'description', 'is_active', 'created_by', 'updated_by']));

      return redirect()->route('nurse-categories.index', $nurse_category)->withSuccess(__('nurse_categories.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NurseCategory $nurse_category)
    {
      return view('admin.nurse_categories.show', compact('nurse_category'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NurseCategoryRequest $request, NurseCategory $nurse_category)
    {
      $nurse_category->update($request->only(['name', 'description', 'is_active', 'updated_by']));
      return redirect()->route('nurse-categories.edit', $nurse_category)->withSuccess(__('nurse_categories.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NurseCategory  $nurse_category)
    {
      $nurse_category->delete();
      return redirect()->route('nurse-categories.index')->withSuccess(__('nurse_categories.deleted'));
    }

    public function getListData()
    {
      $nurse_categories = NurseCategory::select(['id', 'name', 'description', 'is_active'])->get();

      return Datatables::of($nurse_categories)
          ->addColumn('action', function($nurse_category){
            return view('admin.nurse_categories._actions', compact('nurse_category'));
          })
          ->editColumn('id', '{{$id}}')
          ->editColumn('is_active', function($nurse_category){
            return ($nurse_category->is_active) ? 'Active' : 'InActive';
          })
          ->make(true);
    }
}
