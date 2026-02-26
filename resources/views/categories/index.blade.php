@include('errors')

<h2>Categories</h2>

<ul>
    @foreach ($categories as $category)
        <a href="{{ route('categories.show', $category->id)}}" >
            <li>{{ $category->name }}</li>
        </a>
    @endforeach
</ul>

<h3>Create new category</h3>
<p><a href="{{ route('categories.create')}}">Create</a> </p>