<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <!-- ADD PRODUCT -->
    <h1>Add Product</h1>
    <form action="{{ url('product/create') }}" method="post">
        @csrf
        <label>Barcode:</label>
        <input type="text" id="barcode" name="barcode" required maxlength="12"><br>

        <label>Category:</label>
        <input type="text" id="category" name="category" required><br>

        <label>Description:</label>
        <input type="text" id="description" name="description"><br>

        <label>Price:</label>
        <input type="text" id="price" name="price" min="0" required><br>

        <label>Available Qty:</label>
        <input type="number" id="availQuantity" name="availQuantity" min="0" required><br>

        <input type="submit" id="submit" value="Submit">
        <a href="{{ url('product') }}"><button type="button">Cancel</button></a>
    </form>
</body>
</html>
