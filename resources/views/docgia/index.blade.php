@extends('layouts.app')

@section('title', 'Danh Sách Độc Giả')

@section('content')

<h2 class="mb-4 fw-bold text-light" style="letter-spacing: 1px;">
    <i class="bi bi-people-fill me-2"></i> Danh Sách Độc Giả
</h2>

<!-- WRAPPER để control layout của DataTables -->
<div class="d-flex justify-content-between align-items-center mb-2">
    <div id="docgiaTable_length"></div>
    <div id="docgiaTable_filter"></div>
</div>

<table id="docgiaTable" class="display table table-bordered w-100">
    <thead>
        <tr>
            <th>Mã Thẻ</th>
            <th>Họ Tên</th>
            <th>SĐT</th>
            <th>Email</th>
            <th>Ngày Cấp</th>
            <th>Ngày Hết Hạn</th>
            <th>Trạng Thái</th>
            <th>Hành Động</th>
        </tr>
    </thead>
</table>

<a href="/docgia/create" class="btn btn-primary mt-3">
    + Thêm Độc Giả
</a>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="/js/docgia-index.js"></script>

@endsection
