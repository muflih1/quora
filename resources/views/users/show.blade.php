@extends('layout.layout') @section('content') @include('partials._banner') <div
  class="escape_header">
  <main role="main">
    <div class="z-container z-px--large zu-pb--large zu-flex"
      style="padding-top: 30px;">
      <div class="z-box" style="width: 572px;">
        <div class="z-box">
          <div class="zu-flex">
            <div class="zu-me--large zh-flexShrink--0">
              <div class="zh-overflow--hidden zh-borderRadius--circle">
                <img class="zh-block"
                  src="{{ $user->profile_image ? '/storage/'.$user->profile_image : $placeholder_image }}"
                  height="120" width="120" alt="">
              </div>
            </div>
            <div class="zh-flexGrow--1 zh-flexShrink--1">
              <div class="zu-dynamicFontSize--xxlarge zu-font-bold">
                <span>{{ $user->name }}</span>
              </div>
              <div class="zu-mt--tiny"> 
                <div class="zu-flex">
                  @if (count($user->followers) === 1) 
                  <div class="zh-hover--textDecoration_underline zu-cursor--pointer">
                    {{count($user->followers)}} follower 
                  </div>
                  @else 
                  <div class="zh-hover--textDecoration_underline zu-cursor--pointer">
                    {{count($user->followers)}} followers 
                  </div>
                  @endif

                  <div class="zu-ms--tiny">
                    <div class="zu-cursor--pointer zh-hover--textDecoration_underline">
                      {{count($user->following)}} following
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="z-text zu-dynamicFontSize--regular zu-text--gray"
            style="margin-top: 12px;">
            <span>{{ $user->bio }}</span>
          </div>
        </div>
        <div class="z-box zu-mt--small">
          <div class="z-box zu-borderBottom">
            <div class="zu-inline-block">
              <div
                class="zu-dynamicFontSize--regular zu-text--gray_light zu-passColorToLinks">
                <a href="{{ route('users.show', $user->id) }}"
                  class="User-Show-Tab zu-inline-block zu-py--medium zu-px--small zu-position--relative"
                  nav-link>
                  <span>{{ count($user->answers) }} Answers</span>
                  <div class="ACTIVE_BAR"></div>
                </a>
              </div>
            </div>
            <div class="zu-inline-block">
              <div
                class="zu-dynamicFontSize--regular zu-text--gray_light zu-passColorToLinks">
                <a href="{{ route('users.show_answers', $user->id) }}"
                  class="User-Show-Tab zu-inline-block zu-py--medium zu-px--small zu-position--relative"
                  nav-link>
                  <span>{{ count($user->questions) }} Questions</span>
                  <div class="ACTIVE_BAR"></div>
                </a>
              </div>
            </div>
          </div>
          <div class="z-box">
            <div class="z-box zu-borderBottom zu-py--small">
              <div class="zu-flex zu-alignItems--center zu-height--custom_30">
                <div class="zu-dynamicFontSize--regular zu-font--medium">
                  <span>{{ count($user->answers) }} Ansewrs</span>
                </div>
              </div>
            </div>
            <div> @foreach ($user->answers as $answer)
              <x-profile-answer :answer="$answer" /> @endforeach
            </div>
          </div>
        </div>
      </div> @if (auth()->id() === $user->id) <a role="link"
        class="Button-primary-outline"
        href="{{ route('users.edit', auth()->id()) }}">Edit profile</a> @endif
    </div>
  </main>
</div> @endsection