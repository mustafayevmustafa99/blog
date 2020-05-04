@extends('back.layouts.mater')
@section('title','Bütün Səhifələr')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold  text-primary">@yield('title')</h6>
            <h6 class="m-0 font-weight-bold float-right text-primary"><span>{{$pages->count()}}</span> məqalə tapıldı
            </h6>
        </div>
        <div class="card-body">
            <div id="orderSuccess" style="display: none" class="alert alert-success">
                Sıralama Uğurla Həyata Keçtdi
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sıralama</th>
                        <th>Fotoqraf</th>
                        <th>Məqalə Başlıqı</th>
                        <th>Status</th>
                        <th width="100">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="orders">
                    @foreach($pages as $page)
                    <tr id="page_{{$page->id}}">
                        <td class="text-center"><i class="fa fa-arrows-alt-v  fa-2x handle" style="cursor:move;"></i></td>
                        <td><img src="{{$page->image}}" width="200"></td>
                        <td>{{$page->title}}</td>
                        <td><input type="checkbox"  class="switch" page-id="{{$page->id}}" data-on="Aktiv" data-onstyle="success" data-off="Passiv" data-offstyle="danger" @if($page->status==1) checked @endif data-toggle="toggle"></td>
                        <td>
                            <a target="_blank" href="{{route('page',$page->slug)}}" title="Görüntülə" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{route('page.edit',$page->id)}}" title="Redaktə et" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i></a>
                            <a href="{{route('page.delete',$page->id)}}" title="Sil" class="btn btn-sm btn-danger "><i class="fa fa-times"></i></a>

                    </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection

  @section('css')
      <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  @endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.10.2/Sortable.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <script>

        $("#orders").sortable({
            handle:'.handle',
            update:function(){
                var siralama =$('#orders').sortable('serialize');
                $.get("{{route('page.orders')}}?"+siralama,function(data,status){
                    $("#orderSuccess").show();
                    setTimeout(function () {
                          $("#orderSuccess").hide();
                    },1000);
                });
            }

        });

     </script>

    <script>
        $(function() {
            $('.switch').change(function() {
                id = $(this)[0].getAttribute('page-id');
                statu=$(this).prop('checked');
                $.get("{{route('page.switch')}}", {id:id,statu:statu},  function(data, status) {});
            })
        })
    </script>
@endsection
