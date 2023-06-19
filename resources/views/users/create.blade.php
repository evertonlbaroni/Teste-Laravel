@extends('layouts.internal')
@section('main')
    <a href="/users">Vaoltar para listagem</a>
    <form action="/users" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="">Nome*</label>
            <input name="name" value="{{ old('name') }}" type="text" />
            <small class="error">{{ $errors->first('name') }}</small>
        </div>
        <div class="form-group">
            <label for="">E-mail*</label>
            <input name="email" value="{{ old('email') }}" type="text" />
            <small class="error">{{ $errors->first('email') }}</small>
        </div>
        <div class="form-group">
            <label for="">Telefone(s)*</label>
            <div class="input-numbers">
                <div>
                    <input name="numbers[]" value="{{ old('numbers.0') }}" type="text" />
                </div>
                <small class="error">{{ $errors->first('numbers.0') }}</small>
                @for ($i = 1; $i <= 10; $i++)
                    @if (old('numbers.' . $i))
                        <div>
                            <input name="numbers[]" value="{{ old('numbers.' . $i) }}" type="text" />
                            <button class="remove">x</button>
                        </div>
                        <small class="error">{{ $errors->first('numbers.' . $i) }}</small>
                    @endif
                @endfor
            </div>
            <button type="button" class="add">+</button>
            <small class="error">{{ $errors->first('numbers') }}</small>
        </div>
        <div class="form-group">
            <label for="">Senha*</label>
            <input name="password" type="password" />
            <small class="error">{{ $errors->first('password') }}</small>
        </div>
        <div class="form-group">
            <button type="submit">Cadastrar</button>
        </div>
    </form>
@endsection

@section('js')
    <script>
        $(".add").click((e) => {
            let field = $(
                '<div><input name="numbers[]" type="text" /><button class="remove" type="button" >X</button></div>'
            );
            field.find('.remove').click((e) => {
                $(e.target).parent().remove();
            });
            $(".input-numbers").append(field)
        })
    </script>
@endsection
