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
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
