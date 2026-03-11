@extends('layouts.app')

@section('title', 'Kategorier')

@section('content')

<section class="size-full pb-3 pt-3">

    <div class="flex items-center justify-between pt-6 p-3 pb-13">
        <h2 class="text-2xl">Kategorier</h2>
        <a class="bg-slate-600 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded cursor-pointer" href="{{ route('categories.create') }}">Skapa ny kategori</a>
    </div>

    <div class="border border-gray-400 flex-1 bg-white p-4">

        <table class="table" aria-label="navigation list for extended information about products">
    
            <thead>
                <tr>
                    <th class="th-col">Namn</th>
                    <th class="th-col"></th>
                </tr>
            </thead>
    
            <tbody>
                @foreach ($categories as $category)
                <tr class="tr-row"  aria-label="navigation for information about the {{ $category->name }}"> 
                    <td class="td-cell">{{ $category->name }}</td>
                    <td class="td-cell" onclick="window.location='{{ route('categories.show', $category->id)}}'">
                        <div class="flex items-center place-content-center gap-2">
                            <img src="{{ asset('icons/edit.svg')}}" alt="pen" class="w-6 h-6">
                            <span>Ändra</span>
                        </div>
                    </td>
                </tr>
                                    
                @endforeach
            </tbody>
        </table>
    
        <div class="pagination-white">
            {{ $categories->links() }}
        </div>
    </div>
</section>

@endsection
