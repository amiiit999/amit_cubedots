@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ __('View User') }} #{{$user->id}} 
                
                <a class="btn btn-sm btn-danger float-right" href="{{route('admin.users.index')}}" > Back</a>
                </div>

                <div class="card-body">


                {!! Form::model( $user,['route' => ['admin.users.update',$user->id], 'method' => 'POST','class' => 'text-center']) !!} 
                <div class="row text-left">
                @include('components.validation_alert')
                </div>

                <div class="row text-left">
                    <div class="col-md-6">
                        <strong>{!! Form::label('name', 'Name') !!} </strong>
                        <div class="form-group">                        
                            {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Name', 'disabled' =>true]) !!}
                        </div>                       
                    </div>
                    <div class="col-md-6">
                        <strong>{!! Form::label('email', 'Email') !!} </strong>
                        <div class="form-group">                        
                            {!! Form::email('email', null, ['class' => 'form-control','placeholder' => 'Email', 'disabled' =>true]) !!}
                        </div>  
                    </div> 
                  

                    <div class="col-md-6">
                        <strong>{!! Form::label('role', 'Role') !!} </strong>
                        <div class="form-group">                        
                            {!! Form::select('role',$roles, null, ['class' => 'custom-select','placeholder' => 'select', 'disabled' =>true]) !!}
                        </div>                       
                    </div>
                    <div class="col-md-6">
                        <strong>{!! Form::label('status', 'Status') !!} </strong>
                        <div class="form-group">                        
                            {!! Form::select('status',$status, null, ['class' => 'custom-select','placeholder' => 'select', 'disabled' =>true]) !!}
                        </div>                       
                    </div>

                    <div class="col-md-6">
                        <strong>{!! Form::label('created_at', 'Created at') !!} </strong>
                        <div class="form-group">                        
                            {!! Form::text('created_at', null, ['class' => 'form-control','placeholder' => 'Created at', 'disabled' =>true]) !!}
                        </div>                       
                    </div>
                    <div class="col-md-6">
                        <strong>{!! Form::label('updated_at', 'Updated at') !!} </strong>
                        <div class="form-group">                        
                            {!! Form::text('updated_at', null, ['class' => 'form-control','placeholder' => 'Updated at', 'disabled' =>true]) !!}
                        </div>                       
                    </div>

                        
                </div> 
                {!! Form::close() !!}

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
