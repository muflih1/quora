@extends('layout.layout')

@section('content')
    @include('partials._banner')

    <div class="escape_header">
        <div class="z-container z-px-large zu-pb--large" style="padding-top: 30px;">
            <div style="width: 658px; margin-left: auto; margin-right: auto;">

                <div>
                    <div class="zu-border--all zu-boxShadow--small zu-borderRadius--small zu-backgroundColor--raised zh-mb--medium" style="padding: 16px;">
                        <h1 class="zu-dynamicFontSize--xlarge zu-font-bold">People</h1>
                        <div>
                            <div class="zu-pt--medium">
                                @foreach ($users as $user)
                                    <x-user-card :user="$user" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="zu-border--all zu-boxShadow--small zu-borderRadius--small zu-backgroundColor--raised zh-mb--medium" style="padding: 16px;">
                        <h1 class="zu-dynamicFontSize--xlarge zu-font-bold">Answers</h1>
                        <div>
                            <div class="zu-pt--medium">
                                @foreach ($answers as $answer)
                                    <x-profile-answer :answer="$answer" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="zu-border--all zu-boxShadow--small zu-borderRadius--small zu-backgroundColor--raised zh-mb--medium" style="padding: 16px;">
                        <h1 class="zu-dynamicFontSize--xlarge zu-font-bold">Questions</h1>
                        <div>
                            @foreach ($questions as $question)
                                <x-profile-question :question="$question" :existing_user="$user" />
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection