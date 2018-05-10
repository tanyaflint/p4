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
                <a href='/team'> <i class="far fa-edit"></i> Edit Team</a>
            </div>
        </div>
        <h2>Hi there! Create activities</h2>
        <p>Activities created today can be emailed to your team</p>
        <form method='POST' action='/activity/create'>
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="activityNameInput">Activity name</label>
                    <input class="form-control"
                           name='activityName'
                           id="activityNameInput"
                           placeholder="Enter activity name"
                           value='{{ old('activityName', $newActivity->name) }}'>
                    @include('modules.error-field', ['field' => 'activityName'])
                </div>
                <div class="form-group col-sm-6 ">
                    <label for="startOnInput">Start on</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                        </div>
                        <input class="form-control"
                               name='start'
                               id="startOnInput"
                               placeholder='04/01/2018 11:00'
                               value='{{ old('start', $newActivity->date_from) }}'>
                    </div>
                    @include('modules.error-field', ['field' => 'start'])
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6 offset-sm-6">
                    <label for="endOnInput">End on</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                        </div>
                        <input class="form-control"
                               name='end'
                               id="endOnInput"
                               placeholder='04/02/2018 17:00'
                               value='{{ old('end', $newActivity->date_to) }}'>
                    </div>
                    @include('modules.error-field', ['field' => 'end'])
                </div>
            </div>
            <div class="row">
                <div class='col-sm-3 offset-sm-5'>
                    <button type="submit" class="btn btn-primary"> + Add</button>
                </div>
                @include('modules.error-form')
            </div>
        </form>
        <hr>
        <h2 class='mt-5'>These activities are good to go</h2>
        <p>Are you ready to send calendar invites?</p>
        <div class="card-header">
             {{(count($activity) == 0) ? 'No activities today...' : 'Activities created today'}}
        </div>
        <div class="card" class='full-width'>
            <ul class="list-group list-group-flush">
                @foreach($activity as $single)
                    <li class="list-group-item">
                        <div class='row'>
                            <div class='col-sm-6'>
                                <strong>{{$single->name}}</strong>
                            </div>
                            <div class='col-sm-6'>
                                From {{$single->date_from_display}} to {{$single->date_to_display}}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <form method='GET' action='/team/test'>
            <div class="row mt-5">
                <div class='col-sm-3 offset-sm-5'>
                    <button type="submit" class="btn btn-primary">Send now</button>
                </div>
            </div>
        </form>
    </div>
@endsection
