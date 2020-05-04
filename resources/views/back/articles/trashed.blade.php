@extends('back.layouts.mater')
@section('title','Silinən Məqalələr')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold  text-primary">@yield('title')</h6>
            <h6 class="m-0 font-weight-bold float-right text-primary"><span>{{$articles->count()}}</span> məqalə tapıldı
                <a href="{{route('makaleler.index')}}" class="btn btn-primary btn-sm"> Aktiv Məqalələr</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Fotoqraf</th>
                        <th>Məqalə Başlıqı</th>
                        <th>Kategori</th>
                        <th>Hit</th>
                        <th>Yaranma Tarix</th>
                        <th width="100">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td><img src="{{$article->image}}" width="200"></td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->getCategory->name}}</td>
                            <td>{{$article->hit}}</td>
                            <td>{{$article->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('recover.article',$article->id)}}" title="Silməkdən Xilas Et" class="btn btn-sm btn-primary"><i class="fa fa-recycle"></i></a>
                                <a href="{{route('hard.delete.article',$article->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
