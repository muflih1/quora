@extends('layout.layout')

@section('content')
    @include('partials._banner')

    <div class="escape_header">
        <main>
            <div class="z-container z-px--large zu-pb--large z-trick" style="padding-top: 16px;">
                <div style="margin-left: auto; margin-right: auto; width: 572px;">
                    <div>
                        @foreach ($answers as $answer)
                            <x-answer-list-card :answer="$answer" page="index" />
                        @endforeach
                    </div>
                </div>
            </div>
            @include('partials._footer')
        </main>
    </div>

@endsection