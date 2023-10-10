<?php

namespace App\Http\Controllers\Modules\MasterData\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterData\Products\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('modules.masterdata.products.product.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('modules.masterdata.products.product.show', compact('product'));
    }

    public function create()
    {
        if (!auth()->user()->can('create-product')) {
            abort(403, 'Unauthorized action.');
        }

        return view('modules.masterdata.products.product.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'itemcode' => 'required|unique:products',
            'barcode' => 'nullable',
            'name' => 'required',
            'description' => 'nullable',
            'sku' => 'nullable',
            'purchase_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',
            'retail_price' => 'required|numeric',
            'serial_number' => 'nullable',
            'unit_of_measure' => 'nullable',
            'tax_tariff' => 'required',
            'product_group' => 'nullable',
            'brand' => 'nullable',
            'active' => 'boolean',
            'material' => 'boolean',
            'service' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->route('masterdata.products.product.create')
                ->withErrors($validator)
                ->withInput();
        }

        Product::create($request->all());

        return redirect()->route('masterdata.products.product.index')->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        if (!auth()->user()->can('edit-product')) {
            abort(403, 'Unauthorized action.');
        }

        $product = Product::findOrFail($id);
        return view('modules.masterdata.products.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'itemcode' => 'required|unique:products,itemcode,' . $id,
            'barcode' => 'nullable',
            'name' => 'required',
            'description' => 'nullable',
            'sku' => 'nullable',
            'purchase_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',
            'retail_price' => 'required|numeric',
            'serial_number' => 'nullable',
            'unit_of_measure' => 'nullable',
            'tax_tariff' => 'required',
            'product_group' => 'nullable',
            'brand' => 'nullable',
            'active' => 'boolean',
            'material' => 'boolean',
            'service' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->route('masterdata.products.product.edit', $id)
                ->withErrors($validator)
                . withInput();
        }

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('masterdata.products.product.index')->with('success', 'Product updated successfully');
    }
}
