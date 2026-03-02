@include('errors')
    
<a href="{{ route('products.index') }}">back</a> 

<h2>{{$product->name}}</h2> 

<p>id: {{$product->id}}</p>
<p>material: {{$product->material}}</p>
<p>color: {{$product->color}}</p>
<p>cost: {{$product->price}} kr</p>
<p>{{$product->description}}</p>
