@extends('gentelelladashboard::layouts.main')

@section('content')

<x-admin.page-title :title="'Páginas'" />

<div class="row">

    <div class="col-xs-12">

        <div class="x_panel">
            <div class="x_content">

                <div class="x_header">

                    <x-admin.panel-title :title="'Edição de página'" />

                </div>

                <div class="x_body">

                    {{ Form::model($model, ['route' => [$wildcard . '.update', $model->id]]) }}

                        @method('PUT')
                        @include('admin.modules.'. $wildcard .'.form')

                    {{ Form::close() }}

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
