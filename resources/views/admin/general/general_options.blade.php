@extends('layouts.master')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Genel Ayarlar
            </h1>
            <p style="margin-top: 20px">
                @include('admin.includes.info-box')
            </p>
        </section>


        <!-- Main content -->
        <section class="content">
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <form role="form" action="{{route('admin.postgeneralsettings')}}" method="POST">
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Site Başlığı</label>
                                    <input type="text" class="form-control" name="title" placeholder="Site Başlığı"
                                           value="{{count($generalOption) ? $generalOption->title : ''}}">
                                </div>
                                <div class="form-group">
                                    <label>Site Açıklaması</label>
                                    <input type="text" class="form-control" name="description"
                                           placeholder="Site Açıklaması"
                                           value="{{count($generalOption) ? $generalOption->description : ''}}">
                                </div>
                                <div class="form-group">
                                    <label>Site Keywords</label>
                                    <input type="text" class="form-control" name="keywords"
                                           placeholder="Site Keywords"
                                           value="{{count($generalOption) ? $generalOption->keywords : ''}}">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Ad Soyad</label>
                                    <input type="text" class="form-control" name="name" placeholder="Ad Soyad"
                                           value="{{count($generalOption) ? $generalOption->name : ''}}">
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" name="email" placeholder="E-mail"
                                           value="{{count($generalOption) ? $generalOption->email : ''}}">
                                </div>
                                <div class="form-group">
                                    <label>Telefon</label>
                                    <input type="text" class="form-control" name="tel" placeholder="Telefon"
                                           value="{{count($generalOption) ? $generalOption->tel : ''}}">
                                </div>
                                <div class="form-group">
                                    <label>Adres</label>
                                    <input type="text" class="form-control" name="address" placeholder="Adres"
                                           value="{{count($generalOption) ? $generalOption->address : ''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Sosyal Ağlar</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-facebook"
                                                                           aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="facebook" placeholder="Facebook"
                                               value="{{count($generalOption) ? $generalOption->facebook : ''}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="twitter" placeholder="Twitter"
                                               value="{{count($generalOption) ? $generalOption->twitter : ''}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-google-plus"
                                                                   aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="googleplus" placeholder="Google+"
                                               value="{{count($generalOption) ? $generalOption->googleplus : ''}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-youtube" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="youtube" placeholder="Youtube"
                                               value="{{count($generalOption) ? $generalOption->youtube : ''}}">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Google Map API</label>
                                    <input type="text" class="form-control" name="google_maps"
                                           placeholder="Google API"
                                           value="{{count($generalOption) ? $generalOption->google_maps : ''}}">
                                </div>
                                <div class="form-group">
                                    <label>Mesai Saatleri</label>
                                    <input type="text" class="form-control" name="work_hours"
                                           placeholder="Mesai Saatleri"
                                           value="{{count($generalOption) ? $generalOption->work_hours : ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box-body">

                            </div>
                        </div>
                        {{csrf_field()}}
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                        </div>
                        <!-- /.box-body -->
                    </form>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
            <!-- /.modal -->
        </section>
    </div>
@endsection