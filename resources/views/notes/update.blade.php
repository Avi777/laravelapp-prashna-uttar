@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-lg-8 offset-1">
    <p class="flow-text">Update</p>
    <form action={{route('notes.save',['id'=>$note->id])}} method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title" value="{{$note->title}}">
        </div>
        <div class="form-group">
            <label for="body">Text</label>
            <input name="body" type="text" class="form-control" id="body" value="{{$note->body}}">
        </div>
            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </form>
</div>
</div>
</div>
@endsection