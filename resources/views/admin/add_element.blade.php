@extends('layouts.master')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Element Ekle
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- SELECT2 EXAMPLE -->
                <div class="col-md-6">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true">&times;
                        </button>
                        <h4><i class="icon fa fa-ban"></i> Uyarı!</h4>
                        Web Geliştirme hakkında bir bilginiz yok ise bu paneli kullanırken dikkat ediniz!
                    </div>

                    <form action="{{route('admin.postnewelement')}}" method="POST">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <div class="box-title">
                                    <small>Yeni elementler ekleyerek sitenize dinamizm kazandırabilirsiniz.</small>
                                </div>
                            </div>
                            <div class="box-body">

                                <form action="">
                                    <div class="form-group">
                                        <label for="">Element ismi</label>
                                        <input type="text" class="form-control" name="element_name"
                                               placeholder="Ayar Adı -- Çoğul olarak eklemeye özen gösterin | Örn: Resimler">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="photoOption">
                                            <option>Resim</option>
                                            <option value="1">Resim kullan</option>
                                            <option value="0">Resim kullanma</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="categoryOption">
                                            <option>Kategori</option>
                                            <option value="1">Kategori kullan</option>
                                            <option value="0">Kategori kullanma</option>
                                        </select>
                                    </div>
                                </form>
                                <div class="modal-footer">
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                                <!-- /.modal-content -->
                            </div><!-- col-md-7 -->
                        </div>
                    </form>
                </div>
                <div class="col-sm-6">

                    <div class="box box-default">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <small>Yeni elementler ekleyerek sitenize dinamizm kazandırabilirsiniz.</small>
                            </div>
                        </div>
                        <div class="box-body">
                            @if(count($elements))
                                <table class="table table-striped">
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Element</th>
                                        <th style="width: 40px">Label</th>
                                    </tr>
                                    @foreach($elements as $key=>$element)
                                        <tr>
                                            <td>{{$key}}</td>
                                            <td>{{$element->name}}</td>
                                            <td>
                                                <a class="btn btn-danger btn-sm" href="{{route('admin.getelementdelete', ['id' => $element->id])}}">Sil</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <h5> Kayıtlı herhangi bir <strong>Element</strong> bulunamadı</h5>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection