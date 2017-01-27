@extends('layouts.master')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{$element->name}} Ekle
            </h1>
        </section>
    @include('admin.includes.info-box')
    <!-- Main content -->
        <section class="content">
            <div class="row">
                <form action="{{route('admin.postaddelementtopic', ['id' => $element->id])}}" method="POST"
                      enctype="multipart/form-data">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="col-md-8">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <div class="box-title">
                                    <small>{{$element->name}} ekleyebilirsiniz.</small>
                                </div>
                            </div>
                            <div class="box-body">
                                <label for="exampleInputEmail1">{{$element->name}} Başlığı</label>
                                <input type="text" class="form-control" name="topic_title" placeholder="Slider Adı">
                                <hr>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{$element->name}} İçerik </label>
                                    <textarea class="textarea" placeholder="Place some text here" name="topic_body"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                </textarea>
                                </div>
                            </div>

                            <div class="modal-footer">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @if($element->isCategory)
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <div class="box-title">
                                        <small>Kategori Seç</small>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="form-group">
                                        <select class="form-control" name="selectedCategory">
                                            @foreach($element->categories as $el)
                                                <option value="{{$el->id}}">{{$el->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($element->isPhoto)
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <div class="box-title">
                                        <small>Resim</small>
                                    </div>
                                    <hr>
                                    <div class="col-sm-12">
                                        <label class="btn btn-success btn-file btn-lg col-sm-12">
                                            Resim seç <input type="file" name="file" id="file">
                                        </label>
                                    </div>
                                </div>

                            </div>
                        @endif
                    </div>
                </form>
                <div class="col-md-4">
                @if(count($element->sidemenu))
                    <form action="{{route('admin.postelementsidemenu', ['id' => $element->id])}}" method="POST">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <div class="box-title">
                                    <small>Eklenen ayarlar</small>
                                </div>
                            </div>


                            <div class="col-sm-10 col-sm-offset-1">

                                @if($element->sidemenu->isText)
                                    <div class="form-group">
                                        <label>{{$element->sidemenu->text_label}}</label>
                                        <input type="text" class="form-control" name="text"
                                               placeholder="Ayar Adı"
                                               value="{{$element->sidemenu->text}}">
                                    </div>
                                    <hr>
                                @endif

                                @if($element->sidemenu->isParagraph)
                                    <div class="form-group">
                                        <label>{{$element->sidemenu->paragraph_label}}</label>
                                        <textarea class="form-control" rows="5" name="paragraph"
                                                  placeholder="Paragraf">{{$element->sidemenu->paragraph}}</textarea>
                                    </div>
                                    <hr>
                                @endif

                                @if($element->sidemenu->isMenu)
                                    <div class="form-group">
                                        <label>{{$element->sidemenu->menu_label}}</label>
                                        <input type="text" class="form-control" name="menu"
                                               placeholder="Ayar Adı"
                                               value="{{$element->sidemenu->menu}}">
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
            </div>
        </section>
    </div>
@endsection