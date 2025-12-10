<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Độc Giả</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body class="p-4">

    <h2 class="mb-4">📚 Danh Sách Độc Giả</h2>

    <table id="docgiaTable" class="display table table-bordered">
        <thead>
            <tr>
                <th>Mã Thẻ</th>
                <th>Họ Tên</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
    </table>

    <a href="/docgia/create" class="btn btn-primary mt-3">+ Thêm Độc Giả</a>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script src="/js/docgia-index.js"></script>
</body>
</html>
