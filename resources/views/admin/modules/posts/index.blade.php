@extends('gentelelladashboard::layouts.main')

@section('head-assets')

    <link href="{{ asset('vendor/gentelelladashboard/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/gentelelladashboard/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/gentelelladashboard/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/gentelelladashboard/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/gentelelladashboard/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

@endsection

@section('content')

<x-admin.page-title :title="'Posts'" />

<div class="row">

    <div class="col-xs-12">

        <div class="x_panel">
            <div class="x_content">

                <div class="x_body">

                    <div class="x_panel_header">
                        <div class="row">
                            <div class="col-sm-6">
                                <x-admin.panel-title :title="'Listagem de Posts'" />
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="{{ route($wildcard . '.create') }}" class="btn btn-success">Criar Post</a>
                            </div>
                        </div>
                    </div>

                    <div class="x_panel_body">

                        <div class="table-responsive">

                            <table class="table table-striped jambo_table data-table">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">ID</th>
                                        <th class="column-title">Título</th>
                                        <th class="column-title">Ativo</th>
                                        <th class="column-title">Data Criação</th>
                                        <th class="column-title no-link last no-sort">
                                            <span class="nobr">Ações</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($models as $model)

                                        <tr class="{{ ($loop->even ? 'even' : 'odd') . ' pointer' }}">
                                            <td class=" ">{{ $model->id }}</td>
                                            <td class=" ">{{ $model->title }}</td>
                                            <td class=" ">{{ $model->boolForHumans() }}</td>
                                            <td class=" ">{{ $model->creationDate() }}</td>
                                            <td class="a-right a-right ">
                                                <a href="{!! route($wildcard . '.edit', $model->id) !!}"><i class="fa fa-edit"></i></a>
                                                &nbsp;|&nbsp;
                                                {{ Form::open(['route' => [$wildcard . '.destroy', $model->id], 'class' => 'form-destroy']) }}
                                                @method('DELETE')
                                                <button type="submit"><i class="fa fa-trash"></i></button>

                                                {{ Form::close() }}
                                            </td>
                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection

@section('footer-assets')

    <script src="{{ asset('vendor/gentelelladashboard/vendors/datatables.net/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/gentelelladashboard/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/gentelelladashboard/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/gentelelladashboard/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/gentelelladashboard/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/gentelelladashboard/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/gentelelladashboard/vendors/datatables.net-buttons/js/buttons.print.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/gentelelladashboard/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/gentelelladashboard/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/gentelelladashboard/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/gentelelladashboard/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/gentelelladashboard/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}" type="text/javascript"></script>

@endsection
