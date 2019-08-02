@csrf
<div class="input-field">
    <input type="text" name="title" value="{{ old('title', $question->title) }}" id="question-title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">
    <label for="question-title">Question Title</label>

    @if ($errors->has('title'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </div>
    @endif
</div>
<br/>
<div class="input-field"> 
    <textarea name="body" id="question-body" rows="10" class="materialize-textarea form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">{{ old('body', $question->body) }}</textarea>
    <label for="question-body">Explain you question</label>

    @if ($errors->has('body'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('body') }}</strong>
        </div>
    @endif
</div>
<br/>
<div class="form-group">
    <button type="submit" class="btn btn-outline-primary">{{ $buttonText }}</button>
</div>