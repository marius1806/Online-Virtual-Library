@extends('master')

@section('content')
    <h1 class="title">Welcome to the Virtual Library!</h1>
    <h1 class="logo"><a href="{{ route('search') }}">📖</a></h1> 

    <!-- Content -->
    <div class="text-content">
            Here everyone can borrow books without even going personally to get them. 
        You can acces any book from a big variety and read them here. This is the 
        place where you can read anything without having to go anywhere. You can read 
        anything you like from everywhere around the world! The rules are: you can borrow 
        up to 3 books at once and you must always return the book to mantain a good 
        comunity. We wish you a pleasant and elaxing experience here on Virtual Library!
    </div>
@endsection