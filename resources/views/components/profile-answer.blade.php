@props(['answer', 'page'])

<div class="zu-borderBottom zu-pt--medium">
  <div class="zu-mb--small">
    <div class="zu-flex zu-alignItems--center">
      <div class="zh-me--small">
        <div class="zu-flexShrink--0">
          <a href="{{ route('users.show', $answer->user->id) }}">
            <div class="zu-flex zh-overflow--hidden zh-borderRadius--circle">
              <img src="{{ $answer->user->profile_image ? '/storage/'.$answer->user->profile_image : $placeholder_image }}" class="zh-block zh-size--36" alt="">
            </div>
          </a>
        </div>
      </div>
      <div class="zh-my--auto">
        <span>
          <div class="zu-font-bold zh-text--dark_gray_dim zu-dynamicFontSize--small zu-passColorToLinks">
            <a href="{{ route('users.show', $answer->user) }}">
              <span>{{ $answer->user->name }}</span>
            </a>
          </div>
          <div class="z-text zu-dynamicFontSize--small zu-text--gray zu-passColorToLinks">
            <a href="{{ route('questions.show', $answer->question) }}" class="zh-hover--textDecoration_underline">
              <span>{{ date('d-m-Y', strtotime($answer->created_at)); }}</span>
            </a>
          </div>
        </span>
      </div>
    </div>
  </div>
  <div class="zu-mb--tiny">
    <div class="zu-text zu-font-bold zu-dynamicFontSize--regular_title zh-text--dark_gray_dim zu-passColorToLinks">
      <a href="{{ route('questions.show', $answer->question->id) }}">
        <span>{{ $answer->question->title }}</span>
      </a>
    </div>
  </div>
  <div class="z-box">
    <div class="z-text zu-dynamicFontSize--regular zh-answer">
      <p>{!! $answer->content !!}</p>
    </div>
  </div>
  <div class="z-box">
    <div class="zu-flex zu-py--tiny">
      <div class="zu-me--tiny zu-inlineFlex">
        <div class="zu-me--tiny">
          <button class="zu-button zu-button--small zu-borderRadius--rounded">Agree</button>
        </div>
      </div>
    </div>
  </div>
</div>