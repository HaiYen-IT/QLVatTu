<!-- <!DOCTYPE html>
<html>
<head>
    <title>Import Export Excel to database</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
   
<div class="container">

    <div class="card bg-light mt-3">
        <div class="card-header">
            NHẬP, XUẤT DANH MỤC TÀI SẢN
        </div>
        <div class="card-body">
            <form action="{{ route('admin.supplies.import2') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Nhập</button>
                <a class="btn btn-warning" href="{{ route('admin.supplies.export') }}">Xuất</a>
            </form>
        </div>
    </div>
</div> -->
@extends('admin.layouts.app')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Nhập dữ liệu Tài sản</title>
    
    <link rel="stylesheet" href="assets/css/supplies.min.css">
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
</head>

<body>
    <br />
    <div class="main flex">
    @include('admin.layouts.menu')
        <div class="content">
            <div class="container">
                <h3 align="center">Nhập dữ liệu Thiết Bị</h3>
                <br />
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    Upload Validation Error<br><br>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <form method="post" enctype="multipart/form-data" action="{{ route('admin.supplies.importThietBi2') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <table class="table">
                            <tr>
                                <td width="40%" align="right"><label>Select File for Upload</label></td>
                                <td width="30">
                                    <input type="file" name="fileTB" />
                                </td>
                                <td width="30%" align="left">
                                    <input type="submit" name="upload" class="btn btn-primary" value="Nhập">
                                    <a class="btn btn-success" href="{{ route('admin.supplies.exportThietBi') }}">Xuất Excel</a>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" align="right"></td>
                                <td width="30"><span class="text-muted">.xls, .xslx</span></td>
                                <td width="30%" align="left"></td>
                            </tr>
                        </table>
                    </div>
                </form>

                <br />
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">DANH SÁCH THIẾT BỊ</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <!-- <table class="table table-striped table-bordered" style="text-align: center;"> -->
                                <tr class="bg-info">
                                    <th style="text-align: center;">STT</th>
                                    <th style="text-align: center;">Mã Thiết Bị</th>
                                    <th style="text-align: center;">Tên Thiết Bị</th>
                                    <th style="text-align: center;">Mã DMTB</th>
                                    <th style="text-align: center;">Mã Bộ Môn</th>
                                    <th style="text-align: center;">Mô tả</th>
                                    <th style="text-align: center;">Số Lượng</th>
                                    <th style="text-align: center;">Đơn Vị</th>
                                    <th style="text-align: center;">Số Lượng Hỏng</th>
                                    <th style="text-align: center;">Số Lượng Tốt</th>
                                    <th style="text-align: center;">Ghi Chú</th>
                                    <th style="text-align: center;">Ngày Mua</th>
                                    <th style="text-align: center;">Giá Mua</th>
                                    <th style="text-align: center;">Số Lượng Mượn</th>
                                    <th style="text-align: center;">Mã Kho</th>
                                </tr>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->matb }}</td>
                                    <td>{{ $row->tentb }}</td>
                                    <td>{{ $row->iddanhmuc }}</td>
                                    <td>{{ $row->idbomon }}</td>
                                    <td>{{ $row->mota }}</td>
                                    <td>{{ $row->soluong}}</td>
                                    <td>{{ $row->donvitinh}}</td>
                                    <td>{{ $row->soluonghong}}</td>
                                    <td>{{ $row->soluongtot}}</td>
                                    <td>{{ $row->ghichu}}</td>
                                    <td>{{ $row->ngaymua}}</td>
                                    <td>{{ $row->giamua}}</td>
                                    <td>{{ $row->soluongmuon}}</td>
                                    <td>{{ $row->makho}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection