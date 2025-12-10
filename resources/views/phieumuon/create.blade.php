@extends('layouts.app')

@section('title', 'Thêm Phiếu Mượn')

@section('content')

<h2 class="mb-4"><i class="bi bi-book"></i>Thêm Phiếu Mượn</h2>

<div class="card p-4 shadow-lg bg-dark text-light rounded-4">
    <form action="/phieumuon/store" method="POST">
        @csrf

        <div class="mb-3">
            <label>Độc Giả</label>
            <select name="docgia_id" class="form-control" required>
                <option value="">-- Chọn độc giả --</option>
                @foreach($docgia as $dg)
                    <option value="{{ $dg->id }}">{{ $dg->ho_ten }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Sách</label>
            <select name="sach_id" class="form-control" required>
                <option value="">-- Chọn sách --</option>
                @foreach($sach as $s)
                    <option value="{{ $s->id }}">{{ $s->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Ngày Mượn</label>
            <input type="date" name="ngay_muon" class="form-control" required>
        </div>

        <button class="btn btn-success">Lưu Phiếu Mượn</button>
        <a href="/phieumuon" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

@endsection
