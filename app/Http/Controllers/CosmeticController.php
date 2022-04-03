<?php

namespace App\Http\Controllers;

use App\Models\Cosmetic;

use App\Models\Product;
use Illuminate\Http\Request;

class CosmeticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cosmetics = Cosmetic::latest()->paginate();
        return view('admin.cosmatics.index',compact('cosmetics'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cosmatics.create');

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
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/cosmetics/image';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        if ($image = $request->file('image1')) {
            $destinationPath = 'image/cosmetics/image1';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image1'] = "$profileImage";
        }

        Cosmetic::create($input);

        return redirect()->route('cosmatics.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cosmetic  $cosmetic
     * @return \Illuminate\Http\Response
     */
    public function show(Cosmetic $cosmetic)
    {
        return view('admin.cosmatics.show',compact('cosmetic'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cosmetic  $cosmetic
     * @return \Illuminate\Http\Response
     */
    public function edit(Cosmetic $cosmetic , $id)
    {
        $cosmetic = $cosmetic::find($id);
        return view('admin.cosmatics.edit',compact('cosmetic'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cosmetic  $cosmetic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cosmetic $cosmetic ,$id)
    {
        $cosmetic = $cosmetic::find($id);

        $request->validate([
//            'name' => 'required',
//            'detail' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/cosmetics/image';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        if ($image = $request->file('image1')) {
            $destinationPath = 'image/cosmetics/image1';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image1'] = "$profileImage";
        }else{
            unset($input['image1']);
        }

        $cosmetic->update($input);

        return redirect()->route('cosmatics.index')
            ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cosmetic  $cosmetic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cosmetic $cosmetic, $id)
    {
        $cosmetic = Cosmetic::find($id);
        $cosmetic->delete();
        return redirect()->to('cosmatics');
//        $cosmetic->delete($id);
//
//        return redirect()->route('cosmatics.index')
//            ->with('success','Product deleted successfully');
  }
    public function all()
    {
        $cartItems = \Cart::getContent();
        $cosmetics=Cosmetic::all();
        return view('allProductsPages.allcosmetics',compact('cosmetics','cartItems'));
    }
}
