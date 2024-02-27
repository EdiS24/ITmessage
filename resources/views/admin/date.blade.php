@extends('layouts.master')

@section('css')
    <!-- Table css -->
    <link href="{{ URL::asset('plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}" rel="stylesheet"
        type="text/css" media="screen">
@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title text-left">{{__('global.dates')}}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route("admin")}}">{{__('global.home')}}</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('global.dates')}}</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('global.dates')}} {{__('global.list')}}</a></li>
 

        </ol>
    </div>
@endsection
@section('button')
    <a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>{{__('global.ndate')}}</a>


@endsection

@section('content')
@include('includes.flash')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="datatable-buttons" class="table table-hover table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        
                            <thead class="thead-dark">
                                    <tr>
                                        <th data-priority="1">#</th>
                                        <th data-priority="2">{{__('global.title')}}</th>
                                        <th data-priority="4">{{__('global.date')}}</th>
                                        <th data-priority="5">{{__('global.actions')}}</th>
                                     

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dates as $date)
                                        <tr>
                                            <td> {{ $date->id }} </td>
                                            <td> {{ $date->slug }} </td>
                                            <td> {{ $date->date }} </td>
                                            <td>

                                                <a href="#edit{{ $date->slug }}" data-toggle="modal"
                                                    class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i>
                                                    </a>
                                                <a href="#delete{{ $date->slug }}" data-toggle="modal"
                                                    class="btn btn-danger btn-sm delete btn-flat"><i
                                                        class='fa fa-trash'></i></a>

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

    @foreach ($dates as $date)
        @include('includes.edit_delete_date')
    @endforeach

    @include('includes.add_date')

@endsection


@section('script')
    <!-- Responsive-table-->
    <script src="{{ URL::asset('plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js') }}"></script>
@endsection

@section('script')
    <script>
        $(function() {
            $('.table-responsive').responsiveTable({
                addDisplayAllBtn: 'btn btn-secondary'
            });
        });
    </script>
@endsection
