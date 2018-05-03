@extends('layouts.master')

@section('title')
@endsection

@push('head')
    {{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
@endpush

@section('content')
    <div>
        <div class="row">
            <div class="col-md-2 offset-10">
                <i class="far fa-edit"></i> Edit Team
            </div>
        </div>
        <h2>Create activities</h2>
        <p>Hi there! Create activities that you want to schedule</p>


        <form>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="activityNameInput">Activity name:</label>
                    <input class="form-control" id="activityNameInput" aria-describedby="activityHelp" placeholder="Enter activity name">
                </div>
                <div class="form-group col-sm-6">
                    <label for="startOnInput">Start on</label>
                    <input class="form-control" id="startOnInput">
                </div>
            </div>
            <div class="row">

                <div class="form-group col-sm-6 offset-sm-6">
                    <label for="endOnInput">End on</label>
                    <input class="form-control" id="endOnInput">
                </div>
            </div>
            <div class="row">
                <div class='col-sm-3 offset-sm-5'>
                    <button type="submit" class="btn btn-primary"> + Add</button>
                </div>
            </div>
        </form>
        <hr>
        <h2 class='mt-5'>These activites are good to go</h2>
        <p>Are you ready to send calendar invites?</p>
        <div class='row mb-5'>
            <div class='col-sm-6'>
                <strong>People QA</strong>
            </div>
            <div class='col-sm-6'>
                From Monday, 8/29 to Tuesdsay, 8/30
            </div>
        </div>
        <form>
            <div class="row">
                <div class='col-sm-3 offset-sm-5'>
                    <button type="submit" class="btn btn-primary">Send now</button>
                </div>
            </div>
        </form>
    </div>
@endsection
