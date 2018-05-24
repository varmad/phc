<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// use Illuminate\View\View;
// use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\TeritoryPageRequest;
use App\Http\Controllers\Controller;
use App\Models\TeritoryPage;
use Yajra\Datatables\Datatables;

class TeritoryPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $teritory_pages = TeritoryPage::paginate();

      return view('admin.teritory_pages.index', compact('teritory_pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      return view('admin.teritory_pages.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TeritoryPage $teritory_page)
    {
      return view('admin.teritory_pages.edit', compact('teritory_page'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeritoryPageRequest $request)
    {

      $teritory_page = TeritoryPage::create($request->only(['name', 'slug', 'description', 'created_by', 'updated_by', 'status']));

      return redirect()->route('teritory-pages.index', $teritory_page)->withSuccess(__('Teritory page created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TeritoryPage $teritory_page)
    {
      return view('admin.teritory_pages.show', compact('teritory_page'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeritoryPageRequest $request, TeritoryPage $teritory_page)
    {
      $teritory_page->update($request->only(['name', 'slug', 'description', 'created_by', 'updated_by', 'status']));
      return redirect()->route('teritory-pages.edit', $teritory_page)->withSuccess(__('Teritory page updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeritoryPage  $teritory_page)
    {
      $teritory_page->delete();
      return redirect()->route('teritory-pages.index')->withSuccess(__('Teritory page deleted.'));
    }

    public function getListData()
    {
      $teritory_pages = TeritoryPage::select(['id', 'name', 'slug', 'description', 'status'])->get();

      return Datatables::of($teritory_pages)
          ->addColumn('action', function($teritory_page){
            return view('admin.teritory_pages._actions', compact('teritory_page'));
          })
          ->editColumn('id', '{{$id}}')
          ->rawColumns(['description', 'action'])
          ->make(true);
    }
}
