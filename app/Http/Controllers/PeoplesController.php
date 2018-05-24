<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PeopleRequest;

class PeoplesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$peoples = People::paginate();
		return view('peoples.index', compact('peoples'));
	}

    public function show(People $people)
    {
        return view('peoples.show', compact('people'));
    }

	public function create(People $people)
	{
		return view('peoples.create_and_edit', compact('people'));
	}

	public function store(PeopleRequest $request)
	{
		$people = People::create($request->all());
		return redirect()->route('peoples.show', $people->id)->with('message', 'Created successfully.');
	}

	public function edit(People $people)
	{
        $this->authorize('update', $people);
		return view('peoples.create_and_edit', compact('people'));
	}

	public function update(PeopleRequest $request, People $people)
	{
		$this->authorize('update', $people);
		$people->update($request->all());

		return redirect()->route('peoples.show', $people->id)->with('message', 'Updated successfully.');
	}

	public function destroy(People $people)
	{
		$this->authorize('destroy', $people);
		$people->delete();

		return redirect()->route('peoples.index')->with('message', 'Deleted successfully.');
	}
}