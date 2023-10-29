<!-- Form fields for creating/editing products -->
<div class="form-group">
    <label for="itemcode">Item Code</label>
    <input type="text" name="itemcode" id="itemcode" class="form-control" value="{{ old('itemcode', $product->itemcode ?? '') }}" required>
    @error('itemcode')
    <div class="text-danger">{{ $message }}</div>
    @enderror
<div class="form-group">
    <label for="barcode">Barcode</label>
    <input type="text" name="barcode" id="barcode" class="form-control" value="{{ old('barcode', $product->barcode ?? '') }}">
</div>
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
    @error('name')
    <div class="text-danger">{{ $message }}</div>
    @enderror

    <label for="description">Description</label>
    <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $product->description ?? '') }}">

    <label for="sku">SKU</label>
    <input type="text" name="sku" id="sku" class="form-control" value="{{ old('sku', $product->sku ?? '') }}">

    <label for="purchase_price">Purchase price</label>
    <input type="number" name="purchase_price" id="purchase_price" class="form-control"  step="0.01" value="{{ old('purchase_price', $product->purchase_price ?? '') }}" required>
    @error('purchase_price')
    <div class="text-danger">{{ $message }}</div>
    @enderror

    <label for="wholesale_price">Wholesale price</label>
    <input type="number" name="wholesale_price" id="wholesale_price" class="form-control"  step="0.01" value="{{ old('wholesale_price', $product->wholesale_price ?? '') }}" required>
    @error('wholesale_price')
    <div class="text-danger">{{ $message }}</div>
    @enderror

    <label for="retail_price">Retail price</label>
    <input type="number" name="retail_price" id="retail_price" class="form-control"  step="0.01" value="{{ old('retail_price', $product->retail_price ?? '') }}" required>
    @error('retail_price')
    <div class="text-danger">{{ $message }}</div>
    @enderror

    <label for="serial_number">Serial number</label>
    <input type="text" name="serial_number" id="serial_number" class="form-control" value="{{ old('serial_number', $product->serial_number ?? '') }}">
    
    <label for="unit_of_measure">Unit of measure</label>
    <input type="text" name="unit_of_measure" id="unit_of_measure" class="form-control" value="{{ old('unit_of_measure', $product->unit_of_measure ?? '') }}">
    
    <label for="tax_tariff">Tax tariff</label>
    <input type="text" name="tax_tariff" id="tax_tariff" class="form-control" value="{{ old('tax_tariff', $product->tax_tariff ?? '') }}" required>
    @error('tax_tariff')
    <div class="text-danger">{{ $message }}</div>
    @enderror

    <label for="product_group">Product group</label>
    <input type="text" name="product_group" id="product_group" class="form-control" value="{{ old('product_group', $product->product_group ?? '') }}">
    
    <label for="brand">Brand</label>
    <input type="text" name="brand" id="brand" class="form-control" value="{{ old('brand', $product->brand ?? '') }}">

    <label for="active">Active</label>
    <input type="checkbox" name="active" id="active" class="form-check-input">
    @if(old('active', $product->active ?? false)) checked @endif

    <label for="material">Material</label>
    <input type="checkbox" name="material" id="material" class="form-check-input">
    @if(old('material', $product->material ?? false)) checked @endif

    <label for="service">Service</label>
    <input type="checkbox" name="service" id="service" class="form-check-input">
    @if(old('service', $product->service ?? false)) checked @endif
</div>
