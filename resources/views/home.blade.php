@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10 cd-md-offset-2">
        <ul class="collection">
            <li class="collection-item avatar">
                <i class="material-icons blue circle">contacts</i>
                <span class="title">{{Auth::user()->name}}</span>
                <p>{{Auth::user()->email}}
                <br>Threads : {{count(Auth::user()->questions)}}
                </p>
                <a href="#" class="secondary-content">
                <i class="material-icons">grade</i>
                </a>
            </li>
        </ul>
    </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="left">Your Questions</h5>
                    <a href="{{ url('/') }}" class="btn btn-outline-secondary right">Discussion Forum</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach (Auth::user()->questions as $question)
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
    <div class="fixed-action-btn">
    <a class="btn-floating red" href="{{ route('questions.create') }}">
        <i class="large material-icons">add</i>
    </a>
    </div>
</div>
@endsection

@section('extrajs')
<script>
$(document).ready(function(){
$('.fixed-action-btn').floatingActionButton();
});

</script>
@endsection
