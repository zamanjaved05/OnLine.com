<?php

namespace App\Http\Controllers;

use App\Models\Bag;
use App\Models\Cosmetic;
use App\Models\Product1;
use Illuminate\Http\Request;

class Product1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products1 = Product1::latest()->paginate();
        return view('admin.products1.index',compact('products1'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products1.create');

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
            $destinationPath = 'image/products1/image';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        if ($image = $request->file('image1')) {
            $destinationPath = 'image/products1/image1';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Product1::create($input);

        return redirect()->route('products1.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product1  $product1
     * @return \Illuminate\Http\Response
     */
    public function show(Product1 $product1)
    {
        return view('admin.products1.show',compact('product1'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product1  $product1
     * @return \Illuminate\Http\Response
     */
    public function edit(Product1 $product1,$id)
    {
        $product1 = $product1::find($id);
        return view('admin.products1.edit',compact('product1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product1  $product1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product1 $product1 ,$id)
    {
        $product1 = $product1::find($id);

        $request->validate([
//            'name' => 'required',
//            'detail' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/products1/image';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);

        }if ($image = $request->file('image1')) {
            $destinationPath = 'image/products1/image1';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image1'] = "$profileImage";
        }else{
            unset($input['image1']);
        }

        $product1->update($input);

        return redirect()->route('products1.index')
            ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product1  $product1
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product1 $product1 ,$id)
    {
        $product1 = Product1::find($id);
        $product1->delete();
        return redirect()->to('products1');
//        $cosmetic->delete($id);
//
//        return redirect()->route('cosmatics.index')
//            ->with('success','Product deleted successfully');
    }
    public function all()
    {
        $cartItems = \Cart::getContent();
        $bags=Bag::all();
        return view('allProductsPages.allProducts1',compact('bags','cartItems'));
    }
}
