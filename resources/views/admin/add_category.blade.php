@extends('layouts.master')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Kategori Ekle
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- SELECT2 EXAMPLE -->
                <div class="col-md-6">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <small>Kategori ismi</small>
                            </div>
                        </div>
                        <form action="{{route('admin.postelementtopiccategory', ['id' => $element->id])}}" method="POST">
                            <div class="box-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Kategori İsmi" name="new_category">
                                </div>
                            </div>
                            <div class="modal-footer">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-primary">Ekle</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped">
                            <tr>
                                <th><strong>#</strong></th>
                                <th style="padding-left: 100px">Kategori Adı</th>
                                <th style="padding-left: 200px">İşlem</th>
                            </tr>
                            @foreach($element->categories()->get() as $value=>$category)
                                <tr>
                                    <td><strong>{{$value}}</strong></td>
                                    <td style="padding-left: 100px">{{$category->name}}</td>
                                    <td style="padding-left: 200px"><a class="btn btn-danger btn-sm" href="{{route('admin.postdeleteelementtopiccategory', ['id' => $category->id])}}">Sil</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection