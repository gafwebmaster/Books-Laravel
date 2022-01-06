@extends('layouts.app')

@section('content')
<h1>Books list</h1>
<table>
    <tr>
      <th>Title</th>
      <th>Author</th>
      <th>Release date</th>
      <th>Delete</th>
    </tr>
    @foreach ($books as $book)
    <tr>
      <td>{{$book->title}}</td>
      <td>{{$book->author}}</td>
      <td>{{$book->release}}</td>
      <td>
        @if(\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($book->created_at))<=2)
            <a href="/books/delete/{{ $book->id }}">Delete</a>
        @else
            <p>Is older than 2 days</p>
        @endif
      </td>
    </tr>
    @endforeach
  </table>
<a class="register" href="/books">Add a book</a>
@endsection
