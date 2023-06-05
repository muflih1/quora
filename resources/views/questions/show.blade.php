@extends('layout.layout')

@section('content')
    @include('partials._banner')
    <div class="escape_header">
      <main>
        <div class="z-container z-px--large zu-pb--large" style="padding-top: 30px;">
          <div style="width: 658px; margin-left: auto; margin-right: auto;">
            <div class="zu-border--all zu-boxShadow--small zu-backgroundColor--raised zu-borderRadius--small">
              <x-question-list-card :question="$question" page="show" :existing_user="$existing_user" />
              @error('answer_error_message')
                <p>{{ $message }}</p>
              @enderror
            </div>
            <div class="zh-mt--custom__46">
              @foreach ($question->answers as $answer)
                  <x-answer-list-card :answer="$answer" page="show" />
              @endforeach
            </div>
          </div>

        </div>
      </main>
    </div>
@endsection