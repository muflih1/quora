@props(['question', 'existing_user'])

<div class="zu-borderBottom zu-pt--medium">
  <h1 class="zu-dynamicFontSize--regular_title zu-passColorToLinks zu-font-bold">
    <a href="{{ route('questions.show', $question) }}">
      {{ $question->title }}
    </a>
  </h1>
  <div class="zu-mt--small">
    <span class="zu-dynamicFontSize--small zu-text--light zu-font-bold zu-passColorToLinks">
      <a href="{{ route('questions.show', $question) }}">
        @unless (count($question->answers) < 1)
          {{ count($question->answers) }} answers
        @else
          No answers yet
        @endunless
      </a>
    </span>
  </div>
  <div class="acion-box">
    <div class="zu-py--tiny">
      <div class="flex between">
        @unless ($existing_user)
          <a href="{{ route('answers.create', $question) }}" class="zu-button zu-borderRadius--rounded zu-text--gray">Answer</a>zu-borderRadius--rounded zu-text--gray">Edit</a>
        @endunless
        <form action="{{ route('questions.follow', $question) }}" method="POST" class="zu-ms--tiny">
          @csrf
          <button class="zu-button zu-borderRadius--rounded zu-text--gray">Follow</button>
        </form>
      </div>
    </div>
  </div>
</div>

