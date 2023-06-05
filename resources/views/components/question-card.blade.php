@props(['question'])

<div class="zu-pd-tse--16">
  <h1 class="zu-dynamicFontSize--xlarge zu-font-bold zu-passColorToLinks">
    {{ $question->title }}
  </h1>
  <div class="acion-box">
    <div class="zu-py--tiny">
      <div class="flex between">
        <a href="{{ route('answers.create', $question) }}" class="zu-button zu-borderRadius--rounded zu-text--gray">Answer</a>
        <form action="" method="POST" class="zu-ms--tiny">
          @csrf
          <button class="zu-button zu-borderRadius--rounded zu-text--gray">Follow</button>
        </form>
      </div>
    </div>
  </div>
</div>