@isset($categories)
<div class="col-md-3">
    <div class="card">
        <div class="card-header" style="font-family: 'Times New Roman'">
            Kateqoriyalar
        </div>
        <div class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item @if(Request::segment(2)==$category->slug) active @endif" >
                    <a style="font-family:Didot;" @if(Request::segment(2)!=$category->slug) href="{{route('category',$category->slug)}}" @endif>{{$category->name}}</a>
                    <span class="badge  bg-success   float-right  text-white">{{$category->articleCount()}}</span>
                </li>
            @endforeach
        </div>
    </div>
</div>
@endisset
