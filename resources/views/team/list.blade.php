@extends('layouts.master')

@section('title')
@endsection

@push('head')
    {{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
@endpush

@section('content')
    <div>
        <div class="row mb-3">
            <div class="col-md-2">
                <a href='/'> <i class="fas fa-long-arrow-alt-left"></i> Back to activities </a>
            </div>
        </div>
        <h2>Edit team</h2>
        <p>These are the people who will receive your invites. Click to edit info.</p>

        <div class="card-header">
            {{(count($team) == 0) ? "Oops, no one's here." : 'Your team'}}
        </div>
        <div class="card" style="width: 100%;">
            <ul class="list-group list-group-flush">
                @foreach($team as $teammate)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="team/{{$teammate->id}}/edit">
                                    {{$teammate->name}}
                                </a>
                            </div>
                            <div class="col-sm-6">
                                {{$teammate->email}}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <form method='POST' action='/team/create'>
            {{ csrf_field() }}
            @include('team.teamFormInputs')
            <div class="row">
                <div class='col-sm-3 offset-sm-5 mb-4'>
                    <button type="submit" class="btn btn-primary"> + Add Member</button>
                </div>
            </div>
        </form>
        @include('modules.error-form')
    </div>
@endsection