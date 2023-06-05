@extends('layout.layout')

@section('content')
  @include('partials._banner')

  <div class="escape_header">
    <main role="main">
      <div class="container">
        <h1>{{ $question->title }}</h1>
        <form action="{{ route('answers.update', $question->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div id="editor"></div>
            <textarea name="content" id="hide-editor" rows="3" class="hide"></textarea>
          </div>
          <button type="submit">Update</button>
        </form>
        <div class="row">
        </div>
      </div>
    </main>
  </div>

    
@endsection