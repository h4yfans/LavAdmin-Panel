@extends('layouts.master')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Site Ayarları
            </h1>
        </section>

        @include('admin.includes.info-box')


    <!-- Main content -->
        <section class="content">
            <div class="row">
                <form action="{{route('admin.postsitesettings')}}" method="POST">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="col-md-8">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <div class="box-title">
                                    <small>Sitenin ana hatlarını ayarlayınız.</small>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Slider Adı</label>
                                    <input type="text" class="form-control" name="title" placeholder="Slider Adı"
                                           value="{{count($siteSettings) ? ($siteSettings->title ? $siteSettings->title : '') : ''}}">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Slider İçerik </label>
                                    <textarea class="textarea" name="body" placeholder="Place some text here"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        {{count($siteSettings) ? ($siteSettings->body ? $siteSettings->body : '') : ''}}
                                </textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </div>
                            <!-- /.modal-content -->
                        </div><!-- col-md-7 -->
                    </div>
                </form>


                <div class="col-md-4">
                    <form action="{{route('admin.postwhichtypeselected')}}" method="POST">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <div class="box-title">
                                    <small>Yeni ayar ekle.</small>
                                </div>
                            </div>
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group">
                                    <label for="">Ayar tipi</label>
                                    <input type="text" class="form-control" name="setting_label" placeholder="Ayar Adı">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="setting_type">
                                        <option value="0">Ayar Tipi</option>
                                        <option value="1">Yazı</option>
                                        <option value="2">Paragraf</option>
                                        <option value="3">Menü</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-primary">Ekle</button>
                            </div>
                            <!-- /.modal-content -->
                        </div><!-- col-md-7 -->
                    </form>

                    @if(App\Http\Controllers\SiteSettingsController::showSideMenu())
                        <form action="{{route('admin.postsavemenu')}}" method="POST">
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <div class="box-title">
                                        <small>Eklenen ayarlar</small>
                                    </div>
                                </div>

                                <div class="col-sm-10 col-sm-offset-1">

                                    @if($siteSettings->isText)
                                        <div class="form-group">
                                            <label>{{$siteSettings->text_label}}</label>
                                            <input type="text" class="form-control" name="text" placeholder="Ayar Adı"
                                                   value="{{$siteSettings->text}}">
                                        </div>
                                        <hr>
                                    @endif

                                    @if($siteSettings->isParagraph)
                                        <div class="form-group">
                                            <label>{{$siteSettings->paragraph_label}}</label>
                                            <textarea class="form-control" rows="5" name="paragraph"
                                                      placeholder="Paragraf">{{$siteSettings->paragraph}}</textarea>
                                        </div>
                                        <hr>
                                    @endif

                                    @if($siteSettings->isMenu)
                                        <div class="form-group">
                                            <label>{{$siteSettings->menu_label}}</label>
                                            <input type="text" class="form-control" name="menu" placeholder="Ayar Adı"
                                                   value="{{$siteSettings->menu}}">
                                        </div>
                                    @endif
                                </div>

                                <div class="modal-footer">
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                                <!-- /.modal-content -->
                            </div><!-- col-md-7 -->
                        </form>
                    @endif
                </div>
                <!-- /.modal-dialog -->
                <!-- /.modal -->
            </div>
        </section>
    </div>
@endsection