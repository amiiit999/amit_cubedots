<div class="row text-left">
@include('components.validation_alert')
</div>

<div class="row text-left">
    <div class="col-md-6">
        <strong>{!! Form::label('name', 'Name') !!} </strong>
        <div class="form-group">                        
            {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Name']) !!}
        </div>                       
    </div>
    <div class="col-md-6">
        <strong>{!! Form::label('email', 'Email') !!} </strong>
        <div class="form-group">                        
            {!! Form::email('email', null, ['class' => 'form-control','placeholder' => 'Email']) !!}
        </div>  
    </div> 
    <div class="col-md-6">
        <strong>{!! Form::label('password', 'Password') !!} </strong>
        <div class="form-group">  
            {!! Form::password('password', ['class' => 'form-control','placeholder' => 'Password']) !!}
        </div>
    </div> 
    <div class="col-md-6">
        <strong>{!! Form::label('password', 'Confirm Password') !!} </strong>
        <div class="form-group">
            {!! Form::password('password_confirmation', ['class' => 'form-control','placeholder' => 'Confirm Password']) !!}
        </div>
    </div> 

    <div class="col-md-6">
        <strong>{!! Form::label('role', 'Role') !!} </strong>
        <div class="form-group">                        
            {!! Form::select('role',$roles, null, ['class' => 'custom-select','placeholder' => 'select']) !!}
        </div>                       
    </div>
    <div class="col-md-6">
        <strong>{!! Form::label('status', 'Status') !!} </strong>
        <div class="form-group">                        
            {!! Form::select('status',$status, null, ['class' => 'custom-select','placeholder' => 'select']) !!}
        </div>                       
    </div>

    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-sm0 btn-secondary" name="Search">Submit</button>                  

        <a class="btn btn-sm0 btn-danger" href="{{ route('admin.users.index') }}" title="">Cancel </a>
        
    </div>     
</div> 