<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="{{ route('product.update', $product->id) }}" method="POST">
        @csrf
        @method('POST')
        
        <label>Barcode:</label>
        <input type="text" name="barcode" value="{{ $product->barcode }}" required><br>

        <label>Category:</label>
        <input type="text" name="category" value="{{ $product->category }}" required><br>

        <label>Description:</label>
        <input type="text" name="description" value="{{ $product->description }}"><br>

        <label>Price:</label>
        <input type="text" name="price" value="{{ $product->price }}" min="0" required><br>

        <label>Available Qty:</label>
        <input type="number" name="availQuantity" value="{{ $product->availQuantity }}" min="0" required><br>

        <input type="submit" id="submit" value="Submit">
        <a href="{{ url('product') }}"><button type="button">Cancel</button></a>
    </form>
</body>
</html>
