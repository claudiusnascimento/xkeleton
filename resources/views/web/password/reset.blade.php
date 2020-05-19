@extends('web.layouts.form-login')

@section('content')

    <div>

        <div class="login_wrapper">

            <div class="animate form login_form">

                <section class="login_content">

                    @if($errors->reset->any())

                        <x-common.alert :type="'danger'" :text="$errors->reset->first()" />

                    @endif

                    @include('notifications.alert-messages')


                    {{ Form::open(['route' => 'web.password.reset']) }}

                        <h1>Recuperar Senha</h1>

                        <div>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required />
                        </div>

                        <div>
                            <button type="submit" class="btn btn-default submit">Enviar</button>
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
