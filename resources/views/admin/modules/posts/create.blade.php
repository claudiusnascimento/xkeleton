@extends('gentelelladashboard::layouts.main')

@section('content')
<x-admin.page-title :title="'Posts'" />

<div class="row">

    <div class="col-xs-12">

        <div class="x_panel">
            <div class="x_content">

                <div class="x_header">

                    <x-admin.panel-title :title="'Cadastro de Post'" />

                </div>

                <div class="x_body">

                    {{ Form::open(['route' => $wildcard . '.store']) }}

                        @include('admin.modules.'. $wildcard .'.form')

                    {{ Form::close() }}

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
