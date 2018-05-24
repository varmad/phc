<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// use Illuminate\View\View;
// use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ShiftRequest;
use App\Http\Controllers\Controller;
use App\Models\Shift;
use Yajra\Datatables\Datatables;

class ShiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $shifts = Shift::paginate();

      return view('admin.shifts.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      return view('admin.shifts.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
      return view('admin.shifts.edit', compact('shift'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShiftRequest $request)
    {

      $shift = Shift::create($request->only(['name', 'start_time', 'end_time', 'description', 'status']));

      return redirect()->route('shifts.index', $shift)->withSuccess(__('Shift created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
      return view('admin.shifts.show', compact('shift'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShiftRequest $request, Shift $shift)
    {
      $shift->update($request->only(['name', 'start_time', 'end_time', 'description', 'status']));
      return redirect()->route('shifts.edit', $shift)->withSuccess(__('Shift updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shift  $shift)
    {
      $shift->delete();
      return redirect()->route('shifts.index')->withSuccess(__('Shift deleted.'));
    }

    public function getListData()
    {
      $shifts = Shift::select(['id', 'name', 'start_time', 'end_time', 'description', 'status'])->get();

      return Datatables::of($shifts)
          ->addColumn('action', function($shift){
            return view('admin.shifts._actions', compact('shift'));
          })
          ->editColumn('id', '{{$id}}')
          ->make(true);
    }
}
