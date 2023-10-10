<!-- Form fields for creating/editing products -->
<div class="form-group">
    <label for="itemcode">Item Code</label>
    <input type="text" name="itemcode" id="itemcode" class="form-control" value="{{ old('itemcode', $product->itemcode ?? '') }}" required>
    @error('itemcode')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<!-- Add form fields for other attributes here -->
