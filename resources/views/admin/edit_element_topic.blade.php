@extends('layouts.master')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Konuyu Düzenle
            </h1>
        </section>

    @include('admin.includes.info-box')

    <!-- Main content -->

        <section class="content">
            <div class="row">
                <form action="{{route('admin.posteditelementtopic', ['topic_id' => $topic->id,])}}"
                      method="POST"
                      enctype="multipart/form-data">
                    <div class="col-md-8">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <div class="box-title">
                                    <small>{{$topic->title}} içeriğini değiştirebilirsiniz.</small>
                                </div>
                            </div>
                            <div class="box-body">
                                <label for="exampleInputEmail1">İçerik Başlığı</label>
                                <input type="text" class="form-control" name="topic_title" placeholder="Slider Adı"
                                       value="{{$topic->title}}">
                                <hr>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> İçerik </label>
                                    <textarea class="textarea" placeholder="Place some text here" name="topic_body"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        {{$topic->body}}
                                </textarea>
                                </div>
                            </div>

                            <div class="modal-footer">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-primary">Değişiklikleri Kaydet</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <div class="box-title">
                                    <small>Kategori Seç</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group">
                                    <select class="form-control" name="selectedCategory">
                                        @if(count($topic->element->categories))
                                            @foreach($topic->element->categories as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                                Mevcut Kategori:
                                <strong>{{$topic->category_id ? $topic->category->name:'Seçili Kategori Yok'}}</strong>
                            </div>
                        </div>
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
                                    @if(!$topic->image_path == '')
                                        <img src="/uploads/{{$topic->image_path}}" alt="" width="100" height="100">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


                <div class="col-md-4">
                    @if(count($topic->element->sidemenu))
                        <form action="{{route('admin.posteditelementtopicsidemenu', ['element_id' => $topic->element->id])}}"
                              method="POST">
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <div class="box-title">
                                        <small>Eklenen ayarlar</small>
                                    </div>
                                </div>
                                <div class="col-sm-10 col-sm-offset-1">
                                    @if($topic->element->sidemenu->isText)
                                        <div class="form-group">
                                            <label>{{$topic->element->sidemenu->text_label}}</label>
                                            <input type="text" class="form-control" name="text"
                                                   placeholder="Ayar Adı"
                                                   value="{{$topic->element->sidemenu->text}}">
                                        </div>
                                        <hr>
                                    @endif

                                    @if($topic->element->sidemenu->isParagraph)
                                        <div class="form-group">
                                            <label>{{$topic->element->sidemenu->paragraph_label}}</label>
                                            <textarea class="form-control" rows="5" name="paragraph"
                                                      placeholder="Paragraf">{{$topic->element->sidemenu->paragraph}}</textarea>
                                        </div>
                                        <hr>
                                    @endif

                                    @if($topic->element->sidemenu->isMenu)
                                        <div class="form-group">
                                            <label>{{$topic->element->sidemenu->menu_label}}</label>
                                            <input type="text" class="form-control" name="menu"
                                                   placeholder="Ayar Adı"
                                                   value="{{$topic->element->sidemenu->menu}}">
                                        </div>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                            </div><!-- col-md-7 -->
                        </form>
                    @endif
                </div>
                <!-- /.modal-content -->
            </div>
        </section>
    </div>
@endsection