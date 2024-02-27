@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">{{__('global.members')}}</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route("admin")}}">{{__('global.home')}}</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('global.members')}}</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('global.members')}} {{__('global.list')}}</a></li>
  
    </ol>
</div>
@endsection
@section('button')
<a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>{{__('global.nmember')}}</a>
        

@endsection

@section('content')
@include('includes.flash')


                      <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                                <table id="datatable-buttons" class="table table-striped table-hover table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th data-priority="1">{{__('ID')}}</th>
                                                        <th data-priority="2">{{__('global.name')}}</th>
                                                        <th data-priority="3">{{__('global.group')}}</th>
                                                        <th data-priority="4">{{__('global.login_email')}}</th>
                                                        <th data-priority="5">{{__('global.notifications')}}</th>
                                                        <th data-priority="6">{{__('global.member-since')}}</th>
                                                        <th data-priority="7">{{__('global.birthday')}}</th>
                                                        <th data-priority="8">{{__('global.actions')}}</th>
                                                     
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach( $employees as $employee)

                                                        <tr>
                                                            <td>{{$employee->id}}</td>
                                                            <td>{{$employee->name}}</td>
                                                            <td>@if(isset($employee->positions->first()->slug))
                                                                @foreach($employee->positions as $slug)
                                                                {{$slug->slug}} |
                                                                @endforeach
                                                                
                                                                @endif</td>
                                                            <td>{{$employee->email}}</td>
                                                            <td>
                                                                @if(isset($employee->schedules->first()->slug))
                                                                @foreach($employee->schedules as $slug)
                                                                {{$slug->slug}} |
                                                                @endforeach
                                                                
                                                                @endif
                                                            </td>
                                                            <td>{{$employee->created_at}}</td>
                                                            <td>{{$employee->birthday}}</td>
                                                            <td>
                        
                                                                <a href="#edit{{$employee->name}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i></a>
                                                                <a href="#delete{{$employee->name}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i></a>
                                                                <a href="#send{{$employee->name}}" data-toggle="modal" class="btn btn-primary btn-sm send btn-flat"><i class='fa fa-paper-plane'></i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                   
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->    
                                    

@foreach( $employees as $employee)
@include('includes.edit_delete_employee')
@include('includes.send_employee')
@endforeach

@include('includes.add_employee')

@endsection


@section('script')
<!-- Responsive-table-->

@endsection