@extends('front.layouts.master')
@section('title',$article->title)
@section('bg',$article->image)
@section('content')

                <div class="col-md-9 mx-auto">
                     {!! $article->content !!}<br><br><br><br>
                    <span class="text-success" style="font-size:12px;">Oxunma sayı:<b style="font-size:12px;!important;">{{$article->hit}}</b></span>
                </div>
                @include('front.widgets.categoryWidget')


@endsection
