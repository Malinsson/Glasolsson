@include('errors')

<h2>Products</h2>
<ul>
    @foreach ($products as $product)
        <li>{{ $product->name }}</li>
    @endforeach