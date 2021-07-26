<?php

namespace App\Http\Controllers;

use App\Models\Apartments;
use Illuminate\Http\Request;

class ApartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Apartments::all();
        return view('list', [
            'list' => $list
        ]);
    }

//        $products = Apartments::latest()->paginate(5);
//
//        return view('products.index',compact('products'))
//            ->with('i', (request()->input('page', 1) - 1) * 5);

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            $apartment = new Apartments();
            $apartment = fill($request->all());
            $apartment->save();
            return redirect('/list');
        ]);

        Apartments::create($request->all());

        return redirect()->route('products.index')
            ->with('success','Apartments created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartments $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartments $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apartments $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'detail' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success','Apartments updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartments $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success','Apartments deleted successfully');
    }
}
