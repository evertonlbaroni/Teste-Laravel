@extends('layouts.external')
@section('main')
    <main class="login">
        <div class="container">
            <form action="/login" method="POST">
                {{ csrf_field() }}
                <span class="error">
                    {{ $message ?? '' }}
                </span>
                <div class="form-group">
                    <label for="">E-mail*</label>
                    <input name="email" value="{{ old('email') }}" type="text" />
                </div>
                <div class="form-group">
                    <label for="">Senha*</label>
                    <input name="password" type="password" />
                </div>
                <div class="form-group">
                    <button type="submit">Entrar</button>
                </div>
            </form>
        </div>
    </main>
@endsection
