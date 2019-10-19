<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Mikuji;
use Illuminate\Http\Request;

class MikujiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$mikujis = Mikuji::orderBy('id', 'desc')->paginate(10);

		return view('mikujis.index', compact('mikujis'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('mikujis.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$mikuji = new Mikuji();

		$mikuji->name = $request->input("name");
        $mikuji->msg = $request->input("msg");
        $mikuji->price = $request->input("price");
        $mikuji->return_big = $request->input("return_big");
        $mikuji->return_small = $request->input("return_small");
        $mikuji->amount_all = $request->input("amount_all");
        $mikuji->amount_big = $request->input("amount_big");
        $mikuji->amount_small = $request->input("amount_small");
        $mikuji->published = $request->input("published");
		$mikuji->end_time = $request->input("end_time");
		$mikuji->delete_flg = $request->input("delete_flg");
        

		$mikuji->save();

		return redirect()->route('mikujis.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$mikuji = Mikuji::findOrFail($id);

		return view('mikujis.show', compact('mikuji'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$mikuji = Mikuji::findOrFail($id);

		return view('mikujis.edit', compact('mikuji'));
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
		$mikuji = Mikuji::findOrFail($id);

		

		$mikuji->save();

		return redirect()->route('mikujis.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$mikuji = Mikuji::findOrFail($id);
		$mikuji->delete();

		return redirect()->route('mikujis.index')->with('message', 'Item deleted successfully.');
	}

}
