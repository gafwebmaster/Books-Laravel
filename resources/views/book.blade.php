@extends('layouts.app')

@section('content')
<h1>Add a book</h1>
<form method="POST" action="/books/addBook">
    @csrf
    <label for="title"> {{ __('Title') }}</label>
    <input id="title" name="title" type="text" required>

    <label for="author"> {{ __('Author') }}</label>
    <input id="author" name="author" type="text" required>

    <label for="release"> {{ __('Release date') }}</label>
    <input id="release" name="release" type="date" required>

    <button type="submit" class="login">
    {{ __('Register') }}
    </button>
</form>
<a class="register" href="/books/list">See all your books</a>
@endsection
