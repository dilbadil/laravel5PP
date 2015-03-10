<div class="form-group">
    {!! Form::label('fullname', 'Fullname:') !!}
    {!! Form::text('fullname', null, ['class' => 'form-control', 'placeholder' => 'John Doe']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'johndoe@example.com']) !!}
</div>

<div class="form-group">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'johndoe']) !!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password_confirmation', 'Confirm Password:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('role_list', 'Roles:') !!}
    {!! Form::select('role_list[]', $roles, null, ['id' => 'role_list', 'class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section ('footer')
    <script>
    $('#role_list').select2({
        placeholder: 'Choose roles'
    });
    </script>
@endsection
