<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
</head>
<body>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <h1>Products</h1>
    <a href="{{ url('product/create') }}">Add Product</a>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <div class="table">
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Barcode</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Available Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->barcode }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->availQuantity }}</td>
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}">Edit</a>
                            <form action="{{ route('product.delete', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
