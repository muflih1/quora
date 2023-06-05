<div class="banner" role="banner">
  <div class="AppBanner-inner z-container">
    <a href="/" title="Zhihu" class="AppBanner-logo"> Odukamethe </a>
    <ul role="list" class="Tabs AppBanner-Tabs">
      <li role="tab" class="Tab-item AppBanner-Tab">
        <a role="link" class="Tabs-link" nav-link href="/">
          <div class="z-text"> Home </div>
          <div class="ACTIVE_BAR"></div>
        </a>
        <div class="BG_HOVER"></div>
      </li>
      <li role="tab" class="Tab-item AppBanner-Tab">
        <a role="link" class="Tabs-link" nav-link href="{{ route('browse') }}">
          <div class="z-text"> Questions </div>
          <div class="ACTIVE_BAR"></div>
        </a>
        <div class="BG_HOVER"></div>
      </li>
    </ul>
    <div class="AppBanner-search">
      <form action="{{ route('search.index') }}" method="GET">
        <input type="text" name="q" autocomplete="off" placeholder="Search"
          value="{{ old('q') ?? '' }}" />
      </form>
    </div>
    <div class="AppBanner-right"> @auth <a
        href="{{ route('questions.create') }}"
        class="Button-primary-outline Button-small">Ask question</a>
      <div class="AppBanner-Profile-Container">
        <div class="Banner-Profile" data-open-model
          id="profile-popper-reference" aria-describedby="model">
          <img
            src="{{ auth()->user()->profile_image ? '/storage/'.auth()->user()->profile_image : $placeholder_image }}"
            alt="">
        </div>
        <div class="Profile-Model hide" role="dialog"
          id="profile-model-popper-element">
          <div class="arrow" id="profile-model-arrow" data-popper-arrow></div>
          <div class="columns">
            <div
              class="Profile-model profile-area zu-py--small zh-px--medium zu-borderBottom">
              <div class="zu-py--small zu-alignItems--center zu-flex">
                <div
                  class="zh-overflow--hidden zh-borderRadius--circle zh-flexShrink--0"
                  style="margin-right: 12px;">
                  <img class="zh-block"
                    src="{{ auth()->user()->profile_image ? '/storage/'.auth()->user()->profile_image : $placeholder_image }}"
                    height="40" width="40" alt="">
                </div>
                <div class="zh-flexGrow--1 zh-flexShrink--1">
                  <div
                    class="zh-my--auto zu-font-bold zu-dynamicFontSize--regular">
                    <span>{{ auth()->user()->name }}</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="zu-py--tiny">
              <a href="{{ route('users.show', auth()->id()) }}"
                data-model-link>Profile</a>
              <form action="{{ route('auth.logout') }}" method="POST"> @csrf
                <button type="submit" data-model-link>Logout</button>
              </form>
            </div>
          </div>
        </div>
      </div> @else <a href="{{ route('auth.login') }}"
        class="Button-primary-outline">Sign in</a> @endauth
    </div>
  </div>
</div>