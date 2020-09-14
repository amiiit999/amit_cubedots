@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Users') }}  <a class="btn-  btn-sm btn-primary" href="{{route('admin.users.create')}}" > Add New</a>
                </div>

                <div class="card-body">

                 {!! Form::model($searchData, ['route' => ['admin.users.index'], 'method' => 'GET','class' => 'text-center']) !!} 
                   
              <div class="row">
                <div class="col-md-1 pt-2">
                  <strong>{!! Form::label('filter', 'Filter') !!} </strong>                          
                </div>
                <div class="col-md-2">
                      <div class="form-group">                        
                        {!! Form::select('key',['name'=>'Name','name' => 'Name','email' => 'Email','role' =>'Role'] , null, ['class' => 'custom-select','placeholder' => 'Select']) !!}
                    </div>
                </div> 
                <div class="col-md-6">
                      <div class="form-group">              
                        {!! Form::text('value', null, ['class' => 'form-control','placeholder' => 'Type text here']) !!}
                    </div>
                </div> 


                <div class="col-md-2">
                    <div class="form-group">
                  
                    <button type="submit" class="btn btn-sm0 btn-secondary" name="Search"><i class="fas fa-search"></i> Search</button>                  
                    <a class="btn btn-sm0 btn-danger" href="{{ route('admin.users.index') }}" title=""><i class="fa fa-times"></i> </a>
                    </div>
                </div>     
              </div> 
             
               {!! Form::close() !!} 

             
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="20%">Name</th>
                                    <th width="10%">Role</th>     
                                    <th width="20%">Email</th>     
                                    <th width="10%">Status</th>     
                                    <th width="10%">Created At</th>
                                    <th width="10%" align="right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $row)
                                <tr>
                                    <td scope="row">{{ $row->id }}</td>
                                    <td>                      
                                        {{ $row->name }}
                                    </td> 
                                    <td>
                                        {{ $row->role }}
                                    </td>
                                    <td>
                                        {{ $row->email }}
                                    </td> 
                                    <td>
                                        @if($row->status=='active')
                                        <span class="badge badge-pill badge-success">{{ $row->status }}</span>
                                        @else
                                        <span class="badge badge-pill badge-danger">{{ $row->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <small>{{$row->created_at->format('Y-m-d') }}<br>
                                        {{$row->created_at->diffForHumans()}}</small>
                                    </td>                    
                                    <td align="right">
                                        <a href="{{route('admin.users.show',$row->id)}}" class="btn btn-sm btn-secondary" title="View"> <i class="fas fa-eye"></i></a>
                                        
                                        <a href="{{route('admin.users.edit',$row->id)}}" class="btn btn-sm btn-secondary" title="Edit"> <i class="fas fa-edit"></i></a>
                                    
                                        <form method="post" class="delete_form" action="{{route('admin.users.destroy',$row->id)}}" style="display: inline" >@method('DELETE') @csrf <button class="btn btn-sm btn-danger" type="submit"  title="Remove" onclick="return confirm('Are you sure want to delete?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" style="text-align: center">No record to show</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
