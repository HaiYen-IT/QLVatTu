@extends('admin.layouts.app')
@section('content')
    <div class="main flex">
        @include('admin.layouts.menu')
        <link rel="stylesheet" href="assets/css/supplies.min.css">
        <div class="content">
            <div class="content_top">
                <div class="filter flex">
                    <div class="filter-left ">
                        <form action="{{ route('admin.supplies.postFiltermuontb') }}" method="post">
                        {{ csrf_field() }} 
                            <label for="" class="list"><i style="color: blue" class="fal fa-filter"></i> Bộ môn</label>
                                <select name="bomon" id="bomon" class="category combobox" onchange='if(this.value != null) { this.form.submit(); }'>
                                    <option value="">Chọn</option>
                                    <option value="0">Tất cả</option>
                                    <option value="1">Toán</option>
                                    <option value="2">Lý</option>
                                    <option value="3">Sinh</option>
                                </select>
                            <label for="" class="list"><i style="color: blue" class="fal fa-filter"></i> Giáo Viên</label>
                            <select name="tengv" id="tengv" class="gvcombobox">
                                <option value="0">Tất cả</option>
                                @if ($giaoviens!=null){
                                    @foreach($giaoviens as $giaovien)
                                        <option value="{{ $giaovien->id }}">{{ $giaovien->tengv }}</option>
                                    @endforeach 
                                @}
                                @endif
                            </select>  
                            <label for="" class="list"><i style="color: blue"></i> Ngày mượn:</label>
                            <label for="" class="list"><i style="color: blue"></i>{{ $today }}</label> 
                        </form> 
                        <button id='muon' class="btn btn-primary">Mượn thiết bị</button>  
                    </div>
                    <!-- <div class="filter-right">
                        <label for="" class="list"><i style="color: blue" class="fal fa-location"></i> Tình trạng</label>
                        <select name="category" id="category" class="category combobox">
                            <option value="1">Tất cả</option>
                            <option value="2">Còn hàng</option>
                            <option value="3">Đang được bán</option>
                            <option value="4">Hết hàng</option>
                        </select>
                        
                    </div> -->
                </div>
            </div>
            <div class="content_bottom ">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                      <tr class="bg-info">
                        <th scope="col">#</th>
                        <th scope="col">Tên thiết bị</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn vị tính</th>
                        <th scope="col">Số lượng hỏng</th>
                        <th scope="col">Số lượng tốt</th>
                        <th scope="col">Ghi chú</th>
                        <th scope="col">Ngày mua</th>
                        <th scope="col">Giá mua</th>
                        <th scope="col">Số lượng mượn</th>
                        <th scope="col">Số lượng mượn</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($supplie as $item)
                            <div class="product_list_item col-lg-4">
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->tentb }}</td>
                                    <td>{{ $item->mota }}</td>
                                    <td>{{ $item->soluong }}</td>
                                    <td>{{ $item->donvitinh }}</td>
                                    <td>{{ $item->soluonghong }}</td>
                                    <td>{{ $item->soluongtot }}</td>
                                    <td>{{ $item->ghichu }}</td>
                                    <td>{{ $item->ngaymua }}</td>
                                    <td>{{ $item->giamua }}</td>
                                    <td>{{ $item->soluongmuon }}</td>
                                    <input class='slmuon2' value="{{ $item->id }}" type="hidden">
                                    <td><input class='slmuon' id= "input" data-id='{{ $item->id }}' type="number" value="0" min="0" max="5"></input></td>
                                </tr>
                            </div>
                        @endforeach      
                    </tbody>
                  </table>
            </div>
            @include('admin.layouts.popup')
        </div>
        
    </div>
@endsection