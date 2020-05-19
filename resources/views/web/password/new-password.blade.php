@extends('web.layouts.form-login')

@section('content')

    <div>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">

                    @if($errors->reset->any())

                        <x-common.alert :type="'danger'" :text="$errors->reset->first()" />

                    @endif


                    {{ Form::open(['route' => 'web.password.storeNew']) }}

                        <div>
                            <input type="hidden" name="reset_token" value="{{ $token }}">
                        </div>
                        <h1>Nova Senha</h1>
                        <div>
                            <input type="password" name="password" value="" class="form-control" placeholder="Senha" required />
                        </div>
                        <div>
                            <input type="password" name="password_confirmation" value="" class="form-control" placeholder="Confirmação de Senha" required />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit">Salvar</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1>{{ config('app.name') }}</h1>
                                <p>©{{ date('Y') }} All Rights Reserved. {{ config('app.name') }} is a .... Privacy and Terms</p>
                            </div>
                        </div>

                    {{ Form::close() }}

                </section>
            </div>

        </div>

    </div>

@endsection
