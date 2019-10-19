<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task2;
use Illuminate\Http\Request;

class Task2Controller extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$task2s = Task2::orderBy('id', 'desc')->paginate(10);

		return view('task2s.index', compact('task2s'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('task2s.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$task2 = new Task2();

		$task2->title = $request->input("title");
        $task2->price = $request->input("price");
        $task2->body = $request->input("body");
        $task2->published = $request->input("published");

		$task2->save();

		return redirect()->route('task2s.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$task2 = Task2::findOrFail($id);

		return view('task2s.show', compact('task2'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$task2 = Task2::findOrFail($id);

		return view('task2s.edit', compact('task2'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$task2 = Task2::findOrFail($id);

		$task2->title = $request->input("title");
        $task2->price = $request->input("price");
        $task2->body = $request->input("body");
        $task2->published = $request->input("published");

		$task2->save();

		return redirect()->route('task2s.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$task2 = Task2::findOrFail($id);
		$task2->delete();

		return redirect()->route('task2s.index')->with('message', 'Item deleted successfully.');
	}

}
