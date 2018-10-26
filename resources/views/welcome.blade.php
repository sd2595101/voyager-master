@extends('layouts.app')

@section('content')
<div class="container">
@guest
    请<a href="{{route('login')}}">登陆</a>
@else
    @include('parts.posts', ['some' => 'data'])
@endguest
</div>

@endsection
