<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Omikuji;
use Illuminate\Http\Request;

class OmikujiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$omikujis = Omikuji::orderBy('id', 'desc')->paginate(10);

		return view('omikujis.index', compact('omikujis'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('omikujis.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$omikuji = new Omikuji();

		$omikuji->name = $request->input("name");
        $omikuji->msg = $request->input("msg");
        $omikuji->price = $request->input("price");
        $omikuji->return_big = $request->input("return_big");
        $omikuji->return_small = $request->input("return_small");
        $omikuji->amount_all = $request->input("amount_all");
        $omikuji->amount_big = $request->input("amount_big");
        $omikuji-> amount_small = $request->input(" amount_small");
        $omikuji->published = $request->input("published");
        $omikuji->end = $request->input("end");
        $omikuji->created_at = $request->input("created_at");
        $omikuji->updated_at = $request->input("updated_at");
        $omikuji->delete_flg = $request->input("delete_flg");

		$omikuji->save();

		return redirect()->route('omikujis.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$omikuji = Omikuji::findOrFail($id);

		return view('omikujis.show', compact('omikuji'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$omikuji = Omikuji::findOrFail($id);

		return view('omikujis.edit', compact('omikuji'));
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
		$omikuji = Omikuji::findOrFail($id);

		$omikuji->name = $request->input("name");
        $omikuji->msg = $request->input("msg");
        $omikuji->price = $request->input("price");
        $omikuji->return_big = $request->input("return_big");
        $omikuji->return_small = $request->input("return_small");
        $omikuji->amount_all = $request->input("amount_all");
        $omikuji->amount_big = $request->input("amount_big");
        $omikuji-> amount_small = $request->input(" amount_small");
        $omikuji->published = $request->input("published");
        $omikuji->end = $request->input("end");
        $omikuji->created_at = $request->input("created_at");
        $omikuji->updated_at = $request->input("updated_at");
        $omikuji->delete_flg = $request->input("delete_flg");

		$omikuji->save();

		return redirect()->route('omikujis.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$omikuji = Omikuji::findOrFail($id);
		$omikuji->delete();

		return redirect()->route('omikujis.index')->with('message', 'Item deleted successfully.');
	}

}
