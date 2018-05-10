@extends('layouts.master')

@section('title')
@endsection

@push('head')
    {{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
@endpush

@section('content')
    <div>
        <h2>Pick a time</h2>
        <p>We're still working on sending the calendar invites... Select a time and a calendar invite will be sent</p>
        <div class='row'>

            @foreach($activities as $activity)
                <div class='col-lg-3'>
                <h2>{{$activity->name}}</h2>
                @foreach($activityNames[$activity->name] as $time)
                    <a href='#calendar-invite'><div>{{$time}}</div></a>
                @endforeach
                </div>
            @endforeach

        </div>
    </div>
@endsection