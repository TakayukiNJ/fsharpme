<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vision;
use Illuminate\Http\Request;

class VisionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$visions = Vision::orderBy('id', 'desc')->paginate(10);

		return view('visions.index', compact('visions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('visions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$vision = new Vision();

		$vision->title = $request->input("title");
        $vision->msg = $request->input("msg");
        $vision->img = $request->input("img");
        $vision->published = $request->input("published");

		$vision->save();

		return redirect()->route('visions.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$vision = Vision::findOrFail($id);

		return view('visions.show', compact('vision'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vision = Vision::findOrFail($id);

		return view('visions.edit', compact('vision'));
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
		$vision = Vision::findOrFail($id);

		$vision->title = $request->input("title");
        $vision->msg = $request->input("msg");
        $vision->img = $request->input("img");
        $vision->published = $request->input("published");

		$vision->save();

		return redirect()->route('visions.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$vision = Vision::findOrFail($id);
		$vision->delete();

		return redirect()->route('visions.index')->with('message', 'Item deleted successfully.');
	}

}
