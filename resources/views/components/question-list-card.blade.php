@props(['question', 'page', 'existing_user'])

<div class="zu-borderBottom">
  <div class="zu-pd-tse--16">
    <h1 class="{{ $page == "show" ? 'zu-dynamicFontSize--xlarge' : 'zu-dynamicFontSize--regular_title'}} zu-text--gray_dark_dim zu-passColorToLinks zu-font-bold">
      @if ($page == 'show')
        {{ $question->title }}
      @else
        <a href="{{ route('questions.show', $question) }}">
          {{ $question->title }}
        </a>
      @endif
    </h1>
    @unless ($page == "show")
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
    @endunless
    <div class="acion-box">
      <div class="zu-py--tiny">
        <div class="flex between">
          @unless ($existing_user)
            <a href="{{ route('answers.create', $question) }}" class="zu-button zu-borderRadius--rounded zu-text--gray">Answer</a>
          @endunless
          <form action="{{ route('questions.follow', $question) }}" method="POST" class="zu-mx--tiny">
            @csrf
            <button class="zu-button zu-borderRadius--rounded zu-text--gray">Follow</button>
          </form>
          @auth
            @if ($question->user->id === auth()->id())
              <button class="zu-button zu-button--large Button-danger-outline zu-borderRadius--rounded">Delete</button>  
            @endif
          @endauth
        </div>
      </div>
    </div>
  </div>
</div>

