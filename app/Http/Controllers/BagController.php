<?php

namespace App\Http\Controllers;

use App\Models\Bag;
use App\Models\Product1;
use Illuminate\Http\Request;

class BagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $bags = Bag::latest()->paginate();
        return view('admin.bags.index',compact('bags'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
//            'name' => 'required',
//            'detail' => 'required',
//            'images' => 'required|images|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('images')) {
            $destinationPath = 'images/bags';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['images'] = "$profileImage";
        }

        Bag::create($input);

        return redirect()->route('bags.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bag  $bag
     * @return \Illuminate\Http\Response
     */
    public function show(Bag $bag)
    {
        return view('admin.bags.show',compact('bag'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bag  $bag
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $bag = Bag::find($id);
        return view('admin.bags.edit',compact('bag'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bag  $bag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $bag = Bag::find($id);

        $request->validate([
//            'name' => 'required',
//            'detail' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('images')) {
            $destinationPath = 'images/bags';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['images'] = "$profileImage";
        }else{
            unset($input['images']);
        }

        $bag->update($input);

        return redirect()->route('bags.index')
            ->with('success','Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bag  $bag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $bag = Bag::find($id);
        $bag->delete();
        return redirect()->to('bags');
//        $cosmetic->delete($id);
//
//        return redirect()->route('cosmatics.index')
//            ->with('success','Product deleted successfully');
    }
}
