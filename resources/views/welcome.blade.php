@extends('layouts.app')

@section('content')
    @auth
        <app-component />
    @else
        <div class="container">
            <img src="https://php-cat.com/phpcat/ya7.jpg" style="float:left; max-width: 300px; padding-right:1rem;"/>

            <p>проходите регистрацию (справа на верху) и будет доступ к разделам на vue3 .. списки добавить удалить,
                постраничная навигация</p>
            <p>это штука написанная по тз ... есть 2 раздела, заходите покликайте</p>
            <p>
                гит этого проекта > <A href="https://github.com/nyosru/2301-test-lara-vue2"
                    target="_blank">https://github.com/nyosru/2301-test-lara-vue2</A>
                <br />
                описание в readme
            </p>
        </div>
    @endauth
@endsection
