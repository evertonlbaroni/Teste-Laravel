@extends('layouts.internal')

@section('main')
    <a href="/users/create" style="display:block;margin-bottom: 15px">Novo usuário</a>
    <table>
        <thead>
            <tr>
                <th style="text-align: center">Id</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone(s)</th>
                <th  style="text-align: center">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users->getCollection() as $user)
                <tr>
                    <td style="text-align: center">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach ($user->phones as $phone)
                            {{ $phone->number }}
                        @endforeach
                    </td>
                    <td style="text-align: center">
                        <form action="/users/{{ $user->id }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE" />
                            <button>X</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
