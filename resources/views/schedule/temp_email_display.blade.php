@extends('layouts.master')

@section('title')

@endsection

@section('content')
    <h2>This feature is not complete</h2>
    <p>We're still workin on this, after clicking "Send Now" following emails will be sent:</p>

    @foreach($team as $teammate)
        <pre><code>
            To: {{$teammate->email}}

            Hi {{$teammate->name}},

                Click the link to schedule your activities.
                <a href='{{config('app.url')}}/schedule-activities/teammate/{{$teammate->id}}'>{{config('app.url')}}/schedule-activities/teammate/{{$teammate->id}}</a>
                Thanks.
            </code></pre>
    @endforeach
@endsection