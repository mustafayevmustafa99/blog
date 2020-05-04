@extends('back.layouts.mater')
@section('title','Ayarlar')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold  text-primary">@yield('title')</h6>

        </div>
        <div class="card-body">
                <form  method="post" action="{{route('config.update')}}"  enctype="multipart/form-data">
                    @csrf
                     <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label>Sayt Başlığı</label>
                               <input type="text" name="title" required class="form-control" value="{{$config->title}}">
                           </div>
                     </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label>Sayt Aktivlik Vəziyyəti</label>
                                 <select class="form-control" name="active">
                                     <option @if($config->active==1) selected @endif value="1">Açıq</option>
                                     <option @if($config->active==0) selected @endif  value="0">Bağlı</option>
                                 </select>
                             </div>
                         </div>
                     </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sayt Logosu</label>
                                <input type="file" name="logo" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sayt  Favicon</label>
                                <input type="file" name="favicon" class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="text" name="facebook" class="form-control" value="{{$config->facebook}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Twitter</label>
                                <input type="text" name="twitter" class="form-control" value="{{$config->twitter}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="text" name="instagram" class="form-control" value="{{$config->instagram}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Youtube</label>
                                <input type="text" name="youtube" class="form-control" value="{{$config->youtube}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block  btn-md btn-success">Redaktə Et</button>
                    </div>

                </form>
            </div>
        </div>
@endsection
