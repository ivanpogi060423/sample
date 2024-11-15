<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
</head>
<body>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <h1>View Products</h1>

    <!-- Search Form -->
    <form action="{{ url('/product/view') }}" method="GET">
        <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}">
        <button type="submit">Search</button>

        <button type="submit">Filter</button>
    </form>
    
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
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
