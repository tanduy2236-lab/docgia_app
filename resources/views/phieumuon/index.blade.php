@extends('layouts.app')

@section('title', 'Mượn / Trả Sách')

@section('content')

<h2 class="mb-4 fw-bold"><i class="bi bi-arrow-left-right"></i> Mượn / Trả Sách</h2>
<link rel="stylesheet" href="/css/popup.css">
<a href="/phieumuon/add" class="btn btn-gradient-primary mb-3">
    <i class="bi bi-plus-circle me-1"></i> Thêm Phiếu Mượn
</a>

<div class="card shadow-lg border-0" style="background:#1e1e2f; color:#fff;">
    <div class="card-body">
        <table id="muonTable" class="table table-hover text-white">
            <thead style="background:#0d0d1a;">
                <tr>
                    <th>ID</th>
                    <th>Độc Giả</th>
                    <th>Ngày Mượn</th>
                    <th>Ngày Trả</th>
                    <th>Trạng Thái</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $row)
                <tr class="table-row-hover">
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->docgia->ho_ten }}</td>
                    <td>{{ $row->ngay_muon }}</td>
                    <td>{{ $row->ngay_tra ?: 'Chưa trả' }}</td>

                    <td>
                        @if($row->trangthai == 'Đang mượn')
                            <span class="badge bg-warning">Đang mượn</span>
                        @else
                            <span class="badge bg-success">Đã trả</span>
                        @endif
                    </td>

                    <td>
                        @if($row->trangthai == 'Đang mượn')
                            <a href="/phieumuon/tra/{{ $row->id }}" class="btn btn-success btn-sm">
                                <i class="bi bi-check2-circle"></i> Trả sách
                            </a>
                        @endif

<a href="javascript:void(0)" 
   class="btn btn-danger btn-sm"
   onclick="showPopup('Xóa phiếu mượn này?', function(){ deletePM({{ $row->id }}) })">
   <i class="bi bi-trash-fill"></i> Xóa
</a>




                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#muonTable').DataTable();
});
</script>
<script src="/js/popup.js"></script> 
@endsection
