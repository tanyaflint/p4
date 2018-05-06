@if($errors->get($field))
    <div class='text-danger'>
        @foreach($errors->get($field) as $error)
            {{ $error }}
        @endforeach
    </div>
@endif