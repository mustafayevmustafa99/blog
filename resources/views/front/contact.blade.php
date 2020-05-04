@extends('front.layouts.master')
@section('title','Əlaqə')
@section('bg','front/img/s.jpg')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 ">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)

                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
                <form method="post" action="{{route('contact.post')}}">
                 @csrf
                    <div class="card rounded-0">
                        <div class="card-header p-0">
                            <div class="bg-info text-white text-center py-2">
                                <h3 style="font-family: SansSerif;"><i class="fa fa-envelope"></i> Bizimlə Əlaqə Saxlaya Bilərsiniz!</h3>
                            </div>
                        </div>
                        <div class="card-body p-3">

                            <!--Body-->
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                    </div>
                                    <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="Ad Soyad" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                    </div>
                                    <input type="email" class="form-control" value="{{old('email')}}" id="email" name="email"  placeholder="Email Ünvanı" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-phone-square text-info"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                           placeholder="Telefon" value="{{old('phone')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                    </div>
                                    <textarea class="form-control" style="height: 200px;" name="message" placeholder="Mesajınız" required>{{old('message')}}</textarea>
                                </div>
                            </div>

                            <div class="text-center">
                                <input type="submit" value="Göndər" class="btn btn-info btn-block rounded-0 py-2">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="col-md-3 text-center my-5">
                <ul class="list-unstyled my-5">
                    <li class="my-5"><i class="fas fa-map-marker-alt fa-2x" style="color: blue;font-size:36px;"></i>
                        <p class="mt-1">Bakı</p>
                    </li>

                    <li class="my-5"><i class="fas fa-phone fa-2x" style="color: blue; font-size: 36px;"></i>
                        <p class="mt-1"> +994 50 301 24 38 </p>
                    </li>

                    <li class="my-5"><i class="fas fa-envelope fa-2x" style="color: blue; font-size: 36px"></i>
                        <p class="mt-1"> info@diyetoloqum.az </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection



