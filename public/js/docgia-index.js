$(document).ready(function () {
    let table = $('#docgiaTable').DataTable({
        ajax: {
            url: "/api/docgia",
            dataSrc: ""
        },
        columns: [
            { data: "ma_the" },
            { data: "ho_ten" },
            { data: "so_dien_thoai" },
            { data: "email" },

            { 
                data: "ngay_cap",
                render: val => val ? val : "<i>Chưa có</i>"
            },
            { 
                data: "ngay_het_han",
                render: val => val ? val : "<i>Chưa có</i>"
            },

            {
                data: "trang_thai",
                render: function (val) {
                    return val == 1
                        ? "<span class='text-success fw-bold'>Hoạt động</span>"
                        : "<span class='text-danger fw-bold'>Khóa</span>";
                }
            },

            {
                data: "id",
                render: function (id, type, row) {

                    let btnStatus = row.trang_thai == 1
                        ? `<button class="btn btn-sm btn-secondary btn-toggle" data-id="${id}">Khóa</button>`
                        : `<button class="btn btn-sm btn-success btn-toggle" data-id="${id}">Mở Khóa</button>`;

                    return `
                        <a href="/docgia/${id}/edit" class="btn btn-sm btn-warning">Sửa</a>
                        ${btnStatus}
                        <button data-id="${id}" class="btn btn-sm btn-danger btn-delete">Xóa</button>
                    `;
                }
            }
        ]
    });

    // DELETE
    $(document).on("click", ".btn-delete", function () {
        let id = $(this).data("id");

        showPopupConfirm(
            "Bạn có chắc muốn xóa độc giả này?",
            function () {
                deleteDocGia(id, table);
            }
        );
    });

    // TOGGLE STATUS
    $(document).on("click", ".btn-toggle", function () {
        let id = $(this).data("id");

        showPopupConfirm(
            "Bạn có chắc muốn thay đổi trạng thái độc giả này?",
            function () {
                toggleStatus(id, table);
            }
        );
    });
});

// Hàm xóa
function deleteDocGia(id, table) {
    $.ajax({
        url: `/api/docgia/${id}`,
        type: "DELETE",
        success: function () {
            showPopup("Đã xóa độc giả thành công!");
            table.ajax.reload();
        },
        error: function (res) {
            showPopup("Lỗi: " + JSON.stringify(res.responseJSON));
        }
    });
}

// Hàm đổi trạng thái
function toggleStatus(id, table) {
    $.ajax({
        url: `/api/docgia/${id}/toggle`,
        type: "PUT",
        success: function () {
            showPopup("Đã cập nhật trạng thái!");
            table.ajax.reload();
        },
        error: function (err) {
            showPopup("Lỗi: " + JSON.stringify(err.responseJSON));
        }
    });
}
