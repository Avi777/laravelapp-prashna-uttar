@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-lg-8 offset-1">
    <form action={{route('notes.create')}} method="POST">
        {{ csrf_field() }}
        <div class="input-field">
            <input name="title" id="title" type="text">
            <label for="title">Title</label>
        </div>
        <div class="input-field">
            <input name="body" id="body" type="text">
            <label for="body">Add Notes</label>
        </div>
        <button type="submit" class="btn btn-primary waves-effect waves-light">
            {{ __('Store') }}
        </button>
    </form>
</div>
</div>

<div class="row">
    @foreach ($notes as $note)
    <div class="col-lg-6">
    <div class="card">
    <div class="card-content">
        <span class="card-title">{{$note->title}}</span>
        <p>{{$note->body}}</p>
    </div>
    <!-- ADD LINKS -->
    <div class="card-action">
        <a href="{{route('notes.delete',['id' => $note->id])}}">
            <button class="btn btn-danger">Delete</button>
        </a>
        <a href="{{route('notes.update',['id' => $note->id])}}">
            <button class="btn btn-primary">Update</button>
        </a>
    </div>
    </div>  
    </div>                           
    @endforeach
</div>
</div>
@endsection
