@include('errors')

<h2>Products</h2>
<ul>
    @foreach ($products as $product)
        <li> 
            <a href="{{ route('products.show', $product->id )}}"> 
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