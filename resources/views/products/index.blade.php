@include('errors')

<h2>Products</h2>
<nav aria-label="navigation list for extended information about products">
    <ul>
        @foreach ($products as $product)
            <li> 
                <a href="{{ route('products.show', $product->id )}}" aria-label="navigation for information abour the {{ $product->name }}"> 
                    {{ 
                    "$product->id, 
                    $product->name, 
                    $product->material, 
                    $product->color, 
                    $product->price kr" 
                    }}
                </a> 
            </li>
        @endforeach
    </ul>
{{ $products->links() }}
</nav>