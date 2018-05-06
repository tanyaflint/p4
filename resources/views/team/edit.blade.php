@extends('layouts.master')

@section('title')

@endsection

@push('head')
    {{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
@endpush

@section('content')
    <div>
        <h2>Edit</h2>
        <div class="row">
            <div class="col-md-2">
                <a href='/team'> <i class="fas fa-long-arrow-alt-left"></i> Back to team </a>
            </div>
        </div>
    </div>
    <form method='POST' action='/team/{{$newTeammate->id}}'>
        {{ method_field('put') }}
        {{ csrf_field() }}
        @include('team.teamFormInputs')
        <div class="row">
            <div class='col-sm-3 offset-sm-5 mb-4'>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <div class='col-sm-2'>
                <a href='/team/{{$newTeammate->id}}/delete'>
                    <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
                </a>
            </div>
        </div>
    </form>
    @include('modules.error-form')
@endsection