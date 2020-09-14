@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit User') }} #{{$user->id}}
                
                <a class="btn btn-sm btn-danger float-right" href="{{route('admin.users.index')}}" > Back</a>
                </div>

                <div class="card-body">
                    
                    {!! Form::model( $user,['route' => ['admin.users.update',$user->id], 'method' => 'PUT','class' => 'text-center']) !!} 
                        
                        @include('admin.users._form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
