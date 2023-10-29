<?php

namespace App\Http\Controllers\Modules\MasterData\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules\MasterData\Products\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

/**
 * Class ProductController
 *
 * This controller handles CRUD operations for products in the Master Data module.
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return View
     */
    public function index(): View
    {
        $products = Product::all();
        return view('modules.masterdata.products.product.index', compact('products'));
    }

    /**
     * Display the specified product.
     *
     * @param int $id
     * @return View
     */
    public function show($id): View
    {
        $product = Product::findOrFail($id);
        return view('modules.masterdata.products.product.show', compact('product'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return View
     */
    public function create(): View
    {
        if (!auth()->user()->hasRoleWithPermission('create-product')) {
            abort(403, 'Unauthorized action.');
        }

        return view('modules.masterdata.products.product.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
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
            'active' => 'in:on,true,false',
            'material' => 'in:on,true,false',
            'service' => 'in:on,true,false',
        ]);

        if ($validator->fails()) {

            return redirect()->route('masterdata.products.product.create')
                ->withErrors($validator)
                ->withInput();
        }

        $request['active'] = in_array($request->input('active'), ['on', 'true'], true);
        $request['material'] = in_array($request->input('material'), ['on', 'true'], true);
        $request['service'] = in_array($request->input('service'), ['on', 'true'], true);

        Product::create($request->all());

        return redirect()->route('masterdata.products.index')->with('success', 'Product created successfully');
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param int $id
     * @return View
     */
    public function edit($id): View
    {
        if (!auth()->user()->hasRoleWithPermission('edit-product')) {
            abort(403, 'Unauthorized action.');
        }

        $product = Product::findOrFail($id);
        return view('modules.masterdata.products.product.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
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
            'active' => 'in:on,true,false',
            'material' => 'in:on,true,false',
            'service' => 'in:on,true,false',
        ]);

        if ($validator->fails()) {
            return redirect()->route('masterdata.products.product.edit', $id)
                ->withErrors($validator)
                -> withInput();
        }

        $request['active'] = in_array($request->input('active'), ['on', 'true'], true);
        $request['material'] = in_array($request->input('material'), ['on', 'true'], true);
        $request['service'] = in_array($request->input('service'), ['on', 'true'], true);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('masterdata.products.index')->with('success', 'Product updated successfully');
    }
}
