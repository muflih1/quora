@extends('layout.layout')

@section('content')
    @include('partials._banner')
    <div class="escape_header">
      <main>
        <div class="z-container z-px--large z-trick zu-pb--large" style="padding-top: 30px;">
          <div class="z-box zu-backgroundColor--raised zu-borderRadius--small zu-border--all zu-boxShadow--small zu-pb--small" style="padding: 16px;">
            <h1 class="CreateQuestion-title">Ask a public question</h1>
            <form action="{{ route('questions.store') }}" method="POST">
              @csrf
              <div class="row mbl">
                <textarea name="title" id="ask-textarea" rows="1" placeholder='Start your question with "what", "Why", "How",etc..'>{{ old('title') }}</textarea>
              </div>
              <div class="z-box zu-py--tiny zu-textAlign--right">
                <button type="submit" class="Button-primary ml-auto">Publish</button>
              </div>
            </form>
          </div>
        </div>
      </main>
    </div>
@endsection