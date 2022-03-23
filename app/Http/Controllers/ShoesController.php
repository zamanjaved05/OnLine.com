<?php

namespace App\Http\Controllers;

use App\Models\Shoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShoesController extends Controller
{

    // set index page view
    public function index() {
        $cartItems = \Cart::getContent();
        return view('admin.shoes.shoes',compact('cartItems'));
    }

    // handle fetch all eamployees ajax request
    public function fetchAll() {
        $shoes = Shoes::all();
        $output = '';
        if ($shoes->count() > 0) {
            $output .= '<table class="example">
            <thead>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Image1</th>
                <th>Name</th>
                <th>Price</th>
                <th>Detail</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($shoes as $shoe) {
                $output .= '<tr>
                <td>' . $shoe->id . '</td>
                <td><img src="storage/images/shoes/image/' . $shoe->image . '" width="50" class="img-thumbnail rounded-circle"></td>
                <td><img src="storage/images/shoes/image1/' . $shoe->image1 . '" width="50" class="img-thumbnail rounded-circle"></td>
                <td>' . $shoe->name . ' ' . $shoe->price . '</td>
                <td>' . $shoe->price . '</td>
                <td>' . $shoe->detail . '</td>
                <td>
                  <a href="#" id="' . $shoe->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $shoe->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }

    // handle insert a new employee ajax request
    public function store(Request $request) {
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images/shoes/image', $fileName);

        $file = $request->file('image1');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images/shoes/image1', $fileName);

        $empData = ['name' => $request->name, 'price' => $request->price, 'detail' => $request->detail, 'image' => $fileName, 'image1' => $fileName];
        Shoes::create($empData);
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle edit an employee ajax request
    public function edit(Request $request) {
        $id = $request->id;
        $emp = Shoes::find($id);
        return response()->json($emp);
    }

    // handle update an employee ajax request
    public function update(Request $request) {
        $fileName = '';
        $emp = Shoes::find($request->emp_id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            if ($emp->image) {
                Storage::delete('public/images/' . $emp->image);
            }
        } else {
            $fileName = $request->image;
        }

        $empData = ['name' => $request->name, 'price' => $request->price, 'detail' => $request->detail, 'image' => $fileName];

        $emp->update($empData);
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle delete an employee ajax request
    public function delete(Request $request) {
        $id = $request->id;
        $emp = Shoes::find($id);
        if (Storage::delete('public/images/'.$emp->image)) {
            Shoes::destroy($id);
        }
    }
}
