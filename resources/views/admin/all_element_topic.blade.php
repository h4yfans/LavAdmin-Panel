@extends('layouts.master')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Tüm {{$element->name}}
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Eklenmiş {{$element->name}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-striped text-center">
                        <tr>
                            <th>{{$element->name}} Adı</th>
                            <th>Kategori</th>
                            <th>Resim</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>İşlem</th>
                        </tr>


                        @foreach($element->elementcontext as $elementcontext)
                            <tr>
                                <td>{{$elementcontext->title}}</td>
                                <td>
                                    {{$elementcontext->element->isCategory ? ($elementcontext->category_id == 0 ? 'Kategori Seçimi Yok' : $elementcontext->category->name ) : 'Kategori Yok'}}
                                </td>
                                <td>
                                    <span class="label {{$elementcontext->image_path ? 'label-success' : 'label-danger'}}">{{$elementcontext->image_path ? 'Var' : 'Yok'}}</span>
                                </td>
                                <td>{{$elementcontext->created_at->diffForHumans()}}</td>
                                <td>{{$elementcontext->updated_at->diffForHumans()}}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm"
                                       href="{{route('admin.geteditelementtopic', ['id' =>$elementcontext->id])}}">Düzenle</a>
                                    <a class="btn btn-danger btn-sm"
                                       href="{{route('admin.postdeleteelementtopic' ,['id' => $elementcontext->id])}}">Sil</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
    </div>
@endsection