<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/slate/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/popup.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

</head>

<body class="bg-secondary">

<div class="wrapper">

    <!-- NAV -->
  <nav class="navbar navbar-dark shadow-sm" 
        style="background: linear-gradient(90deg, #1c1c1c, #2a2a2a);">
    <div class="container-fluid d-flex justify-content-start align-items-center">

        <!-- Quản lý Sách -->
      <a class="navbar-brand fw-bold me-4" href="{{ route('books.index') }}">
    <i class="bi bi-book-half me-2"></i>
    Quản Lý Sách
</a>


        <!-- Quản lý Độc Giả -->
        <a class="navbar-brand fw-bold" href="/docgia">
            <i class="bi bi-journal-bookmark-fill me-2"></i>
            Quản Lý Độc Giả
        </a>
<!-- Mượn / Trả Sách -->
<a class="navbar-brand fw-bold" href="/phieumuon">
    <i class="bi bi-arrow-left-right me-2"></i>
    Mượn / Trả Sách
</a>
          <a class="navbar-brand fw-bold" href="/reports">
            <i class="bi bi-bar-chart-fill me-2"></i>
            Thống Kê & Báo Cáo
        </a>

    </div>
</nav>


    <!-- CONTENT -->
    <div class="container content">
        @yield('content')
    </div>

    <!-- POPUP -->
    <div id="customPopupOverlay" class="popup-overlay">
        <div class="popup-box">
            <p id="popupMessage">Thông báo...</p>
            <button class="popup-btn" onclick="closePopup()">OK</button>
        </div>
    </div>

    <div id="popupConfirmOverlay" class="popup-overlay">
        <div class="popup-box">
            <p id="popupConfirmMessage">Bạn chắc chắn?</p>
            <button class="popup-btn" id="popupConfirmYes">Đồng ý</button>
            <button class="popup-btn" style="background:#6c757d" onclick="closeConfirm()">Hủy</button>
        </div>
    </div>

</div> <!-- END WRAPPER -->

<!-- FOOTER -->
<footer class="footer-custom text-center">
    <strong>Ứng Dụng Quản Lý Mượn Trả Sách</strong><br>
    Trần Tấn Duy - 24004705: Làm phần quản lí độc giả<br>
    Nhóm X – Lớp 24CPM01
</footer>

<script>
    function showPopup(message) {
        document.getElementById("popupMessage").innerText = message;
        document.getElementById("customPopupOverlay").style.display = "flex";
    }

    function closePopup() {
        document.getElementById("customPopupOverlay").style.display = "none";
    }

    function showPopupConfirm(message, yesCallback) {
        document.getElementById("popupConfirmMessage").innerText = message;
        document.getElementById("popupConfirmOverlay").style.display = "flex";

        document.getElementById("popupConfirmYes").onclick = function () {
            closeConfirm();
            yesCallback();
        };
    }

    function closeConfirm() {
        document.getElementById("popupConfirmOverlay").style.display = "none";
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/popup.js"></script>
@yield('script') 
</body>
</html>
