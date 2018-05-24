<?php

namespace App\Http\Controllers;

use App\Models\NurseCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NurseCategoryRequest;

class NurseCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$nurse_categories = NurseCategory::paginate();
		return view('nurse_categories.index', compact('nurse_categories'));
	}

    public function show(NurseCategory $nurse_category)
    {
        return view('nurse_categories.show', compact('nurse_category'));
    }

	public function create(NurseCategory $nurse_category)
	{
		return view('nurse_categories.create_and_edit', compact('nurse_category'));
	}

	public function store(NurseCategoryRequest $request)
	{
		$nurse_category = NurseCategory::create($request->all());
		return redirect()->route('nurse_categories.show', $nurse_category->id)->with('message', 'Created successfully.');
	}

	public function edit(NurseCategory $nurse_category)
	{
        $this->authorize('update', $nurse_category);
		return view('nurse_categories.create_and_edit', compact('nurse_category'));
	}

	public function update(NurseCategoryRequest $request, NurseCategory $nurse_category)
	{
		$this->authorize('update', $nurse_category);
		$nurse_category->update($request->all());

		return redirect()->route('nurse_categories.show', $nurse_category->id)->with('message', 'Updated successfully.');
	}

	public function destroy(NurseCategory $nurse_category)
	{
		$this->authorize('destroy', $nurse_category);
		$nurse_category->delete();

		return redirect()->route('nurse_categories.index')->with('message', 'Deleted successfully.');
	}
}
