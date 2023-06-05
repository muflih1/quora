@extends('layout.layout')

@section('content')
  @include('partials._banner')

  <div class="escape_header">
    <main role="main">
      <div class="z-container zu-px-large zu-pb--large" style="padding-top: 60px;">
        <div class="zu-border--all zu-borderRadius--small zu-backgroudColor--white zu-boxShadow--small">
          <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mg-x-24">
              <div class="flex">
                <div class="row">
                  <div class="zu-borderRadis--circle zu-overflow--hidden">
                    <div class="image-180">
                      <label for="profile_image">
                        <img src="{{ $user->profile_image ? $user->profile_image : $placeholder_image }}" alt="" />
                        <input type="file" name="profile_image" id="profile_image">
                      </label>
                      <div class="edit-profile">Change profile</div>
                    </div>
                  </div>
                </div>
  
                <div class="EditPage-Card--right">
                  <div class="Form-Card">
                    <div class="row mbb">
                      <label for="displayName">Display name</label>
                      <input type="text" name="name" id="name" value="{{ $user->name }}">
                    </div>
          
                    <div class="gender mbb">
                      <div class="row">
                        <label>Gender</label>
                      </div>
                      <label for="male" class="custom-radio-parent zh-inlineFlex zu-alignItems--center zh-me--small zu-cursor--pointer">
                        <input type="radio" class="hide" name="sex" value="male" id="male" {{ old('sex', $user->sex) === 'male' ? 'checked' : '' }} />
                        <div class="custum-radio"></div>
                        <div class="zu-ms--small">
                          Male
                        </div>
                      </label>
                      <label for="female" class="custom-radio-parent zh-inlineFlex zu-alignItems--center zu-cursor--pointer">
                        <input type="radio" class="hide" name="sex" value="female" id="female" {{ old('sex', $user->sex) === 'female' ? 'checked' : '' }} />
                        <div class="custum-radio"></div>
                        <div class="zu-ms--small">
                          Female
                        </div>
                      </label>
                    </div>

                    <div class="row mbb">
                      <label>Birth day</label>
                      <div class="flex Edit-Form--dob">
                        <select name="birth_day" id="day" data-selected="{{ $user->birth_day }}">
                          <option disabled>Day</option>
                        </select>
                        <select name="birth_month" id="day" data-selected="{{ $user->birth_month }}">
                          <option disabled>Month</option>
                          <option value="1" {{ old('birth_month', $user->birth_month) == '1' ? 'selected' : '' }}>January</option>
                          <option value="2" {{ old('birth_month', $user->birth_month) == '2' ? 'selected' : '' }}>February</option>
                          <option value="3" {{ old('birth_month', $user->birth_month) == '3' ? 'selected' : '' }}>March</option>
                          <option value="4" {{ old('birth_month', $user->birth_month) == '4' ? 'selected' : '' }}>April</option>
                          <option value="5" {{ old('birth_month', $user->birth_month) == '5' ? 'selected' : '' }}>May</option>
                          <option value="6" {{ old('birth_month', $user->birth_month) == '6' ? 'selected' : '' }}>June</option>
                          <option value="7" {{ old('birth_month', $user->birth_month) == '7' ? 'selected' : '' }}>July</option>
                          <option value="8" {{ old('birth_month', $user->birth_month) == '8' ? 'selected' : '' }}>August</option>
                          <option value="9" {{ old('birth_month', $user->birth_month) == '9' ? 'selected' : '' }}>September</option>
                          <option value="10" {{ old('birth_month', $user->birth_month) == '10' ? 'selected' : '' }}>October</option>
                          <option value="11" {{ old('birth_month', $user->birth_month) == '11' ? 'selected' : '' }}>November</option>
                          <option value="12" {{ old('birth_month', $user->birth_month) == '12' ? 'selected' : '' }}>December</option>
                        </select>
                        <select name="birth_year" id="day" data-selected="{{ $user->birth_year }}"></select>
                      </div>
                    </div>

                    <div class="row mbb">
                      <label for="workPlace">Work place</label>
                      <input type="text" name="work_place" id="workPlace" value="{{ $user->work_place }}">
                    </div>
                    
                    <div class="row mbb">
                      <label for="aboutYou">About you</label>
                      <textarea rows="3" name="bio" id="aboutYou">{{ $user->bio }}</textarea>
                    </div>
          
                    <div class="zu-py--small zu-textAlign--right">
                      <button type="submit" class="Button-primary">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
  
  
          </form>
        </div>

      </div>
    </main>
  </div>

    
@endsection