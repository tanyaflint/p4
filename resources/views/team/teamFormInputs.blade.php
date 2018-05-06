<div class="row mt-4">
    <div class="form-group col-sm-6">
        <label for="activityNameInput">Name:</label>
        <input class="form-control"
               id="Name"
               name='name'
               aria-describedby="nameHelp"
               value='{{ old('name', $newTeammate->name) }}'
               placeholder="Enter first and last name">
        @include('modules.error-field', ['field' => 'name'])
    </div>
    <div class="form-group col-sm-6">
        <label for="Email">Email:</label>
        <input class="form-control"
               id="Email"
               name='email'
               placeholder="Enter email"
               value='{{ old('email', $newTeammate->email) }}'>
        @include('modules.error-field', ['field' => 'email'])
    </div>
</div>