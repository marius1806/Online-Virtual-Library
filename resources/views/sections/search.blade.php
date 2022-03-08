@extends('master')

@section('content')
    <h1 class="title">Choose a book category</h1>

    <!-- Content -->
    <div class="text-content">
        @foreach ($tags as $tag)
            <p class="tags"><a href="{{ route('getBooks', ['name' => $tag->name]) }}"><span class="tag_name">{{ $tag->name }}</span></a></p>
        @endforeach
    </div>
    @yield('search-content')
@endsection