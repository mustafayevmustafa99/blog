@if(count($articles)>0)
@foreach($articles as $article )
    <div class="post-preview">
        <a href="{{route('single',[$article->getCategory->slug,$article->slug])}}">
            <p class="post-title" style="font-size:24px">
                {{$article->title}}
            </p>
            <img src=" {{$article->image}}" style="width: 100%;">
        </a>
        <p class="post-meta" style="font-style:italic!important;">
            <h6 style="display: inline-block!important;font-weight: normal">Kateqoriya:</h6> <a href="#"  style="font-style:normal!important;font-weight: normal;font-size:16px"> {{$article->getCategory->name}}</a>
{{--            <span class="float-right" style="font-size: 15px"> {{Carbon\Carbon::parse($article->created_at)->diffForHumans()}} </span>--}}
        </p>
    </div>
    <hr>
@endforeach
<div>
    {{$articles->links()}}
</div>
@else
    <div class="alert alert-danger" >
        <h5 class="pt-2">Bu kateqoriyaya aid yazı tapılmadı!</h5>
    </div>

@endif

