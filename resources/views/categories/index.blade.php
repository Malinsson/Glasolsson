@extends('layouts.app')

@section('title', 'Kategorier')

@section('content')

<section aria-label="Kategorilista" class="size-full pb-3 pt-3">

    <div class="flex items-center justify-between">
        <h2 class="p-3 text-2xl"><strong>Kategorier</strong></h2>
        <a class="bg-slate-600 hover:bg-slate-800 text-white  py-2 px-4 rounded cursor-pointer focus:outline-2 focus:outline-indigo-500" aria-label="Skapa ny kategori" href="{{ route('categories.create') }}"><strong>Skapa ny kategori</strong></a>
    </div>

    <div class="border border-gray-400 flex-1 bg-white p-4">

        <table class="table" aria-label="Navigeringslista för kategorier" aria-rowcount="{{ $categories->total() + 1 }}">
    
            <thead>
                <tr>
                    <th scope="col" class="th-col">Namn</th>
                    <th scope="col" class="th-col"></th>
                </tr>
            </thead>
    
            <tbody>
                @foreach ($categories as $category)
                <tr class="tr-row" aria-label="Rad för kategori: {{ $category->name }}"> 
                    <td class="td-cell">{{ $category->name }}</td>
                    <td class="td-cell" onclick="window.location='{{ route('categories.show', $category->id)}}'">
                        <button class="flex items-center place-content-center gap-2" aria-label="Redigera kategori">
                            <img src="{{ asset('icons/edit.svg')}}" alt="pen" class="w-6 h-6">
                            Ändra
                        </button>
                    </td>
                </tr>
                                    
                @endforeach
            </tbody>
        </table>
    
        <nav role="navigation" aria-label="Pagination Navigering" class="pagination-white">
            {{ $categories->links() }}
        </nav>
    </div>
</section>

@endsection
