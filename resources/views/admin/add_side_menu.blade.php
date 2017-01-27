@extends('layouts.master')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Alan Ekle
            </h1>
        </section>
    @include('admin.includes.info-box')
    <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- SELECT2 EXAMPLE -->
                <div class="col-md-6">
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-warning"></i> Uyarı!</h4>
                        Yazılım bilginiz yok ise bu bölümle yapacağınız işlemleri dikkatle yapınız!
                    </div>
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <small>Yeni Alan Ekle</small>
                            </div>
                        </div>
                        <form action="{{route('admin.postsidemenus', ['id' => $element->id])}}" method="POST">
                            <div class="box-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="sidemenu_label"
                                           placeholder="Alan başlığı">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="sidemenu_type">
                                        <option>Kategoriler</option>
                                        <option value="1">Yazı</option>
                                        <option value="2">Paragraf</option>
                                        <option value="3">Menü</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped">
                            <tr>
                                <th style="padding-left: 100px">Alan Adı</th>
                                <th style="padding-left: 200px">Alan Türü</th>
                            </tr>
                            @if(count($element->sidemenu))
                                @if($element->sidemenu->isText)
                                    <tr>
                                        <td style="padding-left: 100px">{{$element->sidemenu->text_label}}</td>
                                        <td style="padding-left: 200px"><strong>Yazı</strong></td>
                                    </tr>
                                @endif
                                @if($element->sidemenu->isParagraph)
                                    <tr>
                                        <td style="padding-left: 100px">{{$element->sidemenu->paragraph_label}}</td>
                                        <td style="padding-left: 200px"><strong>Paragraf</strong></td>
                                    </tr>
                                @endif
                                @if($element->sidemenu->isMenu)
                                    <tr>
                                        <td style="padding-left: 100px">{{$element->sidemenu->menu_label}}</td>
                                        <td style="padding-left: 200px"><strong>Menü</strong></td>
                                    </tr>
                                @endif
                            @else
                                <tr>
                                    <td><strong>Özel Alan Eklenmemiştir</strong></td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection