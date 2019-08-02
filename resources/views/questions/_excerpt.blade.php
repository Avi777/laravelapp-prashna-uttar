<div class="media post">
    <div class="d-flex flex-column counters">
        <div class="vote">
            <strong>{{ $question->votes_count }}</strong> {{ str_plural('vote', $question->votes_count) }}
        </div>                            
        <div class="status {{ $question->status }}">
            <strong>{{ $question->answers_count }}</strong> {{ str_plural('answer', $question->answers_count) }}
        </div>                            
        <div class="view">
            {{ $question->views . " " . str_plural('view', $question->views) }}
        </div>                            
    </div>
    <div class="media-body">
        <div class="d-flex align-items-center">
            <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
            <div class="ml-auto">
                <a href="{{ route('notes.savefromquestion', $question->id) }}" class="btn-floating btn-small waves-effect waves-light green darken-1"> <i class="small material-icons">save</i></a>
                @can ('update', $question)
                    <a href="{{ route('questions.edit', $question->id) }}" class="btn-floating btn-small waves-effect waves-light blue darken-1"> <i class="small material-icons">edit</i></a>
                @endcan
                @can ('delete', $question)
                    <form class="form-delete" method="post" action="{{ route('questions.destroy', $question->id) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn-floating btn-small waves-effect waves-light red" onclick="return confirm('Are you sure?')"><i class="small material-icons">delete</i></button>
                    </form>
                @endcan
            </div>
        </div>
        <p class="lead">
            Asked by 
            <a href="{{ $question->user->url }}">{{ $question->user->name }}</a> 
            <small class="text-muted">{{ $question->created_date }}</small>
        </p>
        <div class="excerpt">{{ $question->excerpt(350) }}</div>
    </div>                        
</div>