@extends('layouts.app')

@section('content')
   
    @auth
        <app-component />
    @else
        <div class="container">
            <p>проходите регистрацию (справа на верху) и будет доступ к разделам на vue3 .. списки добавить удалить, постраничная навигация</p>
            <p>это штука написанная по тз ... есть 2 раздела, заходите покликайте
                описание в readme > <A href="https://github.com/nyosru/2301-test-lara-vue2"
                    target="_blank">https://github.com/nyosru/2301-test-lara-vue2</A>
            </p>
        </div>
    @endauth

@endsection
