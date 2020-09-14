@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New User') }}
                
                <a class="btn btn-sm btn-danger float-right" href="{{route('admin.users.index')}}" > Back</a>
                </div>

                <div class="card-body text-left">

                    {!! Form::open( ['route' => ['admin.users.store'], 'method' => 'POST','class' => 'text-center']) !!} 
                        
                        @include('admin.users._form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
