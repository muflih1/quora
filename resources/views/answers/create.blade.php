@extends('layout.layout')

@section('content')
  @include('partials._banner')

  <div class="escape_header">
    <main role="main" style="min-height: calc(100vh - 50px); height: 100%;">
      <div class="z-container z-px-large zu-pb--large" style="padding-top: 30px; height: 100%;">
        <div class="zu-borderAll zu-backgroundColor--raised zu-boxShadow--small" style="padding: 12px 12px 0;">
          <div class="zu-mb--small">
            <textarea id="ask-textarea" readonly class="App-Textarea--readonly">{{ $question->title }}</textarea>
          </div>
          <form action="{{ route('answers.store', $question->id) }}" method="POST">
            @csrf
            <div class="row">
              <textarea name="content" id="editor" rows="3" class="hide"></textarea>
            </div>
            <div class="zu-textAlign--right zu-py--small">
              <button type="submit" class="Button-primary">Publish</button>
            </div>
          </form>
        </div>
      </div>
    </main>
  </div>

    
@endsection