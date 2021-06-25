@extends('layouts.appSuperAdmin')
@section('content')
<?php 
$currentPageURL = URL::current();
$pageArray = explode('/', $currentPageURL);
?>
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-7 col-sm-8 left">
            <div class="container">
    <div id="accordion" class="accordion">
        @if(count($sections) > 0)
            @foreach($sections as $section)
            <div class="card mb-3">
                <div class="card-header collapsed" data-toggle="collapse" href="#collapse{{ $section->id}}">
                    <a class="card-title">{{ $section->section_name }}</a>
                </div>
            <div id="collapse{{ $section->id}}" class="card-body collapse" data-parent="#accordion" >
                 <div class="reading-list">
                    @if($section->id == '1')
                        @if(count($readingQuestions) > 0)
                            @foreach($readingQuestions as $readingQuestion)
                                <a href="{{ route('superadmin-tests-addQuestions',['section_id'=>$section->id,'test_id'=>$pageArray[5],'question_type_id'=>$readingQuestion->id]) }}"><button type="button" class="btn mb-1 btn-primary btn-lg btn-block">{{ $readingQuestion->question_title }}</button></a>
                            @endforeach
                        @endif
                    @elseif ($section->id == '2')
                        @if(count($listeningQuestions) > 0)
                            @foreach($listeningQuestions as $listeningQuestion)
                                <a href="{{ route('superadmin-tests-addQuestions',['section_id'=>$section->id,'test_id'=>$pageArray[5],'question_type_id'=>$listeningQuestion->id]) }}"><button type="button" class="btn mb-1 btn-primary btn-lg btn-block">{{ $listeningQuestion->question_title }}</button></a>
                            @endforeach
                        @endif
                    @elseif ($section->id == '3')
                        @if(count($writingQuestions) > 0)
                            @foreach($writingQuestions as $writingQuestion)
                                <a href="{{ route('superadmin-tests-addQuestions',['section_id'=>$section->id,'test_id'=>$pageArray[5],'question_type_id'=>$writingQuestion->id]) }}">
                                    <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">{{ $writingQuestion->question_title }}</button>
                                </a>
                            @endforeach
                        @endif
                    @else
                        @if(count($speakingQuestions) > 0)
                            @foreach($speakingQuestions as $speakingQuestion)
                                <a href="{{ route('superadmin-tests-addQuestions',['section_id'=>$section->id,'test_id'=>$pageArray[5],'question_type_id'=>$speakingQuestion->id]) }}">
                                    <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">{{ $speakingQuestion->question_title }}</button>
                                </a>
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>
        </div>
            @endforeach
        @endif
    </div>
</div>
            </div>
        </div>
    </section>
@endsection