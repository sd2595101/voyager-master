@extends('layouts.app')

@section('content')
<div class="container">

@include('parts.posts', ['some' => 'data'])


</div>
@endsection
