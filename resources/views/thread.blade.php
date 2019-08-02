@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h4 class="left">Threads</h4>
                <a href="{{ url('/') }}" class="btn btn-outline-secondary right">Discussion Forum</a>
            </div>
            <div class="card-body">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Questions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Answered Questions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Favorites</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                @foreach (Auth::user()->questions as $question)
                <div class="card">
                <div class="card-body">
                    @include ('questions._excerpt')
                </div>
                </div>
                @endforeach
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                @foreach (Auth::user()->answers as $answer)
                <div class="card">
                <div class="card-body">
                    @php
                        $question_id = $answer->question_id;
                        $question = App\Question::find($question_id);
                    @endphp

                    @include ('questions._excerpt')
                </div>
                </div>
                @endforeach
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                @foreach (Auth::user()->favorites as $question)
                <div class="card">
                <div class="card-body">
                    @include ('questions._excerpt')
                </div>
                </div>
                @endforeach
            </div>
            </div>
            </div> 
        </div>
        </div>
    </div>

    <div class="fixed-action-btn">
    <a class="btn-floating red" href="{{ route('questions.create') }}">
        <i class="large material-icons">add</i>
    </a>
    </div>

</div>
@endsection


