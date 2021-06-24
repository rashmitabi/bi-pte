@extends('layouts.appSuperAdmin')
@section('content')
@php
$section_id = $_GET['section_id'];
$test_id    = $_GET['test_id'];
$question_id = $_GET['question_type_id'];
@endphp
<div id="content">

</div>
@endsection
@section('js-hooks')
<script src="{{ asset('assets/js/reading/readingMultipleChoiceChooseSingle.js') }}" defer></script>
@endsection