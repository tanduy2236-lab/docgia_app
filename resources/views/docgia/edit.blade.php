@extends('layouts.app')

@section('title', 'Sửa Độc Giả')

@section('content')

<h2 class="mb-4"><i class="bi bi-pencil-square"></i> Sửa Độc Giả</h2>

<form id="editForm">
    <div class="card p-4 shadow-lg rounded-4 bg-dark text-light">
    <input type="hidden" id="id" value="{{ $id }}">


    <div class="mb-3">
        <label><i class="bi bi-person"></i>Họ Tên</label>
        <input type="text" name="ho_ten" id="ho_ten" class="form-control" required>
    </div>

    <div class="mb-3">
        <label><i class="bi bi-calendar"></i>Ngày Sinh</label>
        <input type="date" name="ngay_sinh" class="form-control">
    </div>

    <div class="mb-3">
        <label>Giới Tính</label>
        <select name="gioi_tinh" id="gioi_tinh" class="form-control">
            <option value="0">Không rõ</option>
            <option value="1">Nam</option>
            <option value="2">Nữ</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Số Điện Thoại</label>
        <input type="text" name="so_dien_thoai" id="so_dien_thoai" class="form-control">
    </div>

    <div class="mb-3">
        <label><i class="bi bi-envelope"></i>Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>

    <div class="mb-3">
        <label>Địa Chỉ</label>
        <textarea name="dia_chi" id="dia_chi" class="form-control"></textarea>
    </div>
<div class="mb-3">
    <label><i class="bi bi-calendar-check"></i>Ngày Cấp</label>
    <input type="date" name="ngay_cap" id="ngay_cap" class="form-control">
</div>

<div class="mb-3">
    <label><i class="bi bi-calendar-x"></i>Ngày Hết Hạn</label>
    <input type="date" name="ngay_het_han" id="ngay_het_han" class="form-control">
</div>
    <button class="btn btn-success"></i>Cập Nhật</button>
    <a href="/docgia" class="btn btn-secondary">Quay Lại</a>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    window.DOCGIA_ID = {{ $id }};
</script>

<script src="/js/docgia-edit.js"></script>


@endsection
