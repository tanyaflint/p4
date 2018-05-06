@extends('layouts.master')

@section('title')

@endsection

@section('content')
    <div>
        <h2>Delete</h2>
        <div class="alert alert-danger" role="alert">
            You are about to delete {{$team->name}}. Are you sure?
        </div>
        <form method='POST' action='/team/{{ $team->id }}'>
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Yes, Delete</button>
            <a href='/team/{{$team->id}}/edit'>
                <button type="button" class="btn btn-primary"><i class="fas fa-long-arrow-alt-left"></i> No, Go back
                </button>
            </a>
        </form>
    </div>
@endsection