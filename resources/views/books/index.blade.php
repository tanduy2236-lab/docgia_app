@extends('layouts.app')

@section('title', 'Quản lý sách')

@section('content')

{{-- Alert --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

{{-- Stats --}}
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card bg-primary text-white shadow-sm">
            <div class="card-body">
                <h5>Tổng sách</h5>
                <p class="fs-3">{{ count($books) }}</p>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between mb-3">
    <h2><i class="bi bi-book-half me-2"></i>Danh sách Sách</h2>
    <button class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#addBookModal">
        <i class="bi bi-plus-circle"></i> Thêm sách
    </button>
</div>

<div class="card shadow-sm">
    <div class="card-header">
        <i class="bi bi-journals me-2"></i>Thông tin sách
    </div>

    <div class="card-body">

        <table id="docgiaTable" class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên sách</th>
                    <th>Tác giả</th>
                    <th>Năm XB</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->year }}</td>

                    <td>
                        {{-- Sửa --}}
                        <button class="btn btn-warning btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#edit{{ $book->id }}">
                            <i class="bi bi-pencil-square"></i>
                            Sửa
                        </button>

                        {{-- Xóa --}}
                        <button class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#delete{{ $book->id }}">
                            <i class="bi bi-trash-fill"></i>
                            Xóa
                        </button>
                    </td>
                </tr>

                {{-- Modal sửa --}}
                <div class="modal fade" id="edit{{ $book->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header bg-warning text-white">
                                <h5 class="modal-title">Sửa sách</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <form method="POST" action="{{ route('books.update', $book->id) }}">
                                @csrf
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label class="form-label">Tên sách</label>
                                        <input type="text" name="title" class="form-control"
                                               value="{{ $book->title }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tác giả</label>
                                        <input type="text" name="author" class="form-control"
                                               value="{{ $book->author }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Năm xuất bản</label>
                                        <input type="number" name="year" class="form-control"
                                               value="{{ $book->year }}" required>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-warning">Cập nhật</button>
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                {{-- Modal xóa --}}
                <div class="modal fade" id="delete{{ $book->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title">Xóa sách</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                Bạn muốn xóa sách:
                                <strong>{{ $book->title }}</strong> ?
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <a href="{{ route('books.delete', $book->id) }}" class="btn btn-danger">Xóa</a>
                            </div>

                        </div>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>

    </div>
</div>

{{-- Modal thêm --}}
<div class="modal fade" id="addBookModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Thêm sách mới</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('books.store') }}">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Tên sách</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tác giả</label>
                        <input type="text" name="author" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Năm xuất bản</label>
                        <input type="number" name="year" class="form-control" min="0" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-success">Thêm sách</button>
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                </div>

            </form>

        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#docgiaTable').DataTable({
            dom: '<"top d-flex justify-content-between"l f>rt<"bottom"ip>',
            language: {
                search: "Tìm kiếm:",
                lengthMenu: "Hiển thị _MENU_ dòng",
                zeroRecords: "Không tìm thấy kết quả",
                info: "Trang _PAGE_ / _PAGES_",
            }
        });
    });
</script>

@endsection
