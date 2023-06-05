@props(['answer', 'page'])

<div class="z-box zu-border--all zu-borderRadius--small zu-boxShadow--small zu-backgroundColor--raised zu-mb--small">
  <div style="padding: 12px 12px 0;">
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
            <div class="zu-font-bold zu-text--gray_dark zu-dynamicFontSize--small zu-passColorToLinks">
              <a href="{{ route('users.show', $answer->user) }}">
                <span>{{ $answer->user->name }}</span>
              </a>
            </div>
            <div class="z-text zu-dynamicFontSize--small zu-text--gray_dark_dim zu-passColorToLinks">
              <a href="{{ route('questions.show', $answer->question) }}" class="zh-hover--textDecoration_underline">
                <span>{{ date('d-m-Y', strtotime($answer->created_at)); }}</span>
              </a>
            </div>
          </span>
        </div>
      </div>
    </div>
    @unless ($page == "show")
      <div class="zu-mb--tiny">
        <div class="zu-text zu-font-bold zu-dynamicFontSize--regular_title zu-text--gray_dark_dim zu-passColorToLinks">
          <a href="{{ route('questions.show', $answer->question->id) }}">
            <span>{{ $answer->question->title }}</span>
          </a>
        </div>
      </div>
    @endunless
    <div class="z-box">
      <div class="z-text zu-dynamicFontSize--regular zh-answer">
        <p>{!! $answer->content !!}</p>
      </div>
    </div>
    <div class="z-box">
      <div class="zu-flex zu-py--tiny">
        <div class="zu-me--tiny zu-inlineFlex">
          <div class="zu-me--tiny">
            <div class="zu-flex">
              <div class="zh-me--tiny">
                <button class="zu-button zu-button--small zu-borderRadius--rounded">Agree</button>
              </div>
              @auth
                @if ($answer->user->id === auth()->id())
                  <form action="{{ route('answers.destroy', $answer) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="zu-button zu-button--small Button-danger-outline zu-borderRadius--rounded">Delete</button>  
                  </form>
                @endif
              @endauth
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>