@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="fw-bold mb-4">
        <i class="bi bi-bar-chart-line-fill"></i> Thống Kê & Báo Cáo
    </h2>

    <!-- ======================= BIỂU ĐỒ ======================== -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">
                <i class="bi bi-graph-up-arrow"></i> TOP 10 Sách Mượn Nhiều Nhất
            </h5>
            <canvas id="chartTopBooks" height="120"></canvas>
        </div>
    </div>

    <!-- ======================= BẢNG 1 ======================== -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">
                <i class="bi bi-book-half"></i> Danh Sách 10 Sách Mượn Nhiều Nhất
            </h5>

            <table id="tableTopBooks" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Tên Sách</th>
                        <th>Số Lần Mượn</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

        </div>
    </div>

    <!-- ======================= BẢNG 2 ======================== -->
    <div class="card shadow mb-5">
        <div class="card-body">
            <h5 class="fw-bold mb-3">
                <i class="bi bi-clock-history"></i> Danh Sách Độc Giả Trễ Hạn
            </h5>

            <table id="tableTreHan" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Độc Giả</th>
                        <th>Sách</th>
                        <th>Ngày Mượn</th>
                        <th>Hạn Trả</th>
                        <th>Số Ngày Trễ</th>
                        <th>Trạng Thái</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

        </div>
    </div>

</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
$(document).ready(function () {

    // =========================== LOAD BẢNG TOP SÁCH ===========================
    let tableTop = $('#tableTopBooks').DataTable({
        dom: 'Bfrtip',
        buttons: ['excel', 'pdf', 'csv', 'print'],
        ajax: '/api/thongke/top-sach',
        columns: [
            { data: 'title' },
            { data: 'so_lan' }
        ]
    });

    // ====================== BIỂU ĐỒ TOP SÁCH MƯỢN ============================
    $.get('/api/thongke/top-sach', function(res) {
        let labels = res.data.map(i => i.title);
        let counts = res.data.map(i => i.so_lan);

        new Chart(document.getElementById("chartTopBooks"), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: "Số lần mượn",
                    data: counts
                }]
            }
        });
    });

    // =========================== LOAD BẢNG TRỄ HẠN ===========================
   $('#tableTreHan').DataTable({
    dom: 'Bfrtip',
    buttons: ['excel', 'pdf', 'csv', 'print'],
    ajax: {
        url: '/api/thongke/tre-han',
        dataSrc: 'data'
    },
    columns: [
        { data: 'docgia' },
        { data: 'sach' },
        { data: 'ngay_muon' },
        { data: 'han_tra' },     // <-- dùng han_tra (khớp với controller)
        { data: 'tre_han' },
        { data: 'trangthai' }
    ]
});


});
</script>
@endsection
