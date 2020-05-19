@extends('web.layouts.form-login')

@section('content')

    <div>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">

                    @if($errors->login->any())
                        <x-common.alert :type="'danger'" :text="$errors->login->first()" />
                    @endif

                     @include('notifications.alert-messages')

                    {{ Form::open(['route' => 'web.login.post']) }}

                        <h1>Formulário de login</h1>
                        <div>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required />
                        </div>
                        <div>
                            <input type="password" name="password" value="" class="form-control" placeholder="Senha" required />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit">Entrar</button>
                            <a class="reset_pass" href="{{ route('web.password.index') }}">Esqueceu a senha?</a>
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
