@extends('layout.layout')

@section('content')
    @include('partials._banner')

    <div class="escape_header">
        <main>
            <div class="z-container z-px--large zu-pb--large z-trick" style="padding-top: 16px;">
                <div style="margin-left: auto; margin-right: auto; width: 572px; border-radius: 2px; box-shadow: 0 1px 2px rgba(0,0,0,0.2)">
                    <div class="zu-borderRadius--small zu-boxShadow--small zu-backgroundColor--raised">
                        @foreach ($questions as $question)
                            <x-question-list-card :question="$question" page="index" :existing_user="null" />
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection