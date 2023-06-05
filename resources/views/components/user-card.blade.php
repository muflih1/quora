@props(['user'])

<div class="zu-flex zu-alignItems--center">
  <div class="zu-flex zu-alignItems--center zh-flexGrow--1 zh-flexShrink--1">
    <div class="zu-me--medium">
      <div class="zu-my--small">
        <div class="zh-overflow--hidden zu-borderRadius--rounded">
          <a href="{{ route('users.show', $user) }}">
            <img class="zh-block" height="50" width="50" src="{{ $user->profile_image ? '/storage/'.$user->profile_image : $placeholder_image }}" alt="" />
          </a>
        </div>
      </div>
    </div>
    <div class="zu-dynamicFontSize--regular_title zu-font-bold zu-passColorToLinks">
      <a href="{{ route('users.show', $user) }}">
        <span>{{ $user->name }}</span>
      </a>
    </div>
  </div>
  <div class="zh-flexShrink--0">
    <form action="{{ route('users.follow', $user) }}" method="POST">
      @csrf
      <button class="zu-button Button-primary-outline">Follow</button>
    </form>
  </div>
</div>