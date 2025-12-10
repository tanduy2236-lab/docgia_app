const id = window.DOCGIA_ID;

// Load dữ liệu ban đầu
$.get(`/api/docgia/${id}`, function (res) {
    $("#id").val(res.id);
    $("#ho_ten").val(res.ho_ten);
    $("#ngay_sinh").val(res.ngay_sinh);
    $("#gioi_tinh").val(res.gioi_tinh);
    $("#so_dien_thoai").val(res.so_dien_thoai);
    $("#email").val(res.email);
    $("#dia_chi").val(res.dia_chi);
    $("#ngay_cap").val(res.ngay_cap);
    $("#ngay_het_han").val(res.ngay_het_han);

});

// Cập nhật
$("#editForm").submit(function (e) {
    e.preventDefault();

    let data = $(this).serialize();
    const id = $('#id').val();

    $.ajax({
        url: `/api/docgia/${id}`,
        type: "PUT",
        data: data,
        success: function () {
            showPopup("Cập nhật độc giả thành công!");
        },
        error: function (res) {
            showPopup("Lỗi: " + JSON.stringify(res.responseJSON));
        }
    });
});
