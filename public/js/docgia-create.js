$("#createForm").submit(function(e){
    e.preventDefault();

    $.ajax({
        url: "/api/docgia",
        method: "POST",
        data: $(this).serialize(),
        success: function(res){
            showPopup("Thêm độc giả thành công!");
        },
        error: function(xhr){
            showPopup("Có lỗi xảy ra, vui lòng kiểm tra lại!");
        }
    });
});
