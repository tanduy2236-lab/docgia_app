function showPopup(message, onConfirm = null) {
    // Xóa popup cũ (nếu có)
    let old = document.querySelector(".popup-overlay");
    if (old) old.remove();

    // Tạo popup mới
    let div = document.createElement("div");
    div.className = "popup-overlay";
    div.innerHTML = `
        <div class="popup-box">
            <p>${message}</p>
            <button class="popup-btn confirm">OK</button>
            <button class="popup-btn cancel" style="background:#444;margin-left:10px;">Hủy</button>
        </div>
    `;

    document.body.appendChild(div);

    // 👉 Quan trọng nhất: hiện popup
    div.style.display = "flex";

    // Nhấn OK
    div.querySelector(".confirm").onclick = () => {
        div.remove();
        if (onConfirm) onConfirm();
    };

    // Nhấn Hủy
    div.querySelector(".cancel").onclick = () => div.remove();
}

function deletePM(id) {
    $.ajax({
        url: `/api/phieumuon/${id}`,
        type: "DELETE",
        success: function () {
            alert("Đã xóa phiếu mượn!");
            window.location.href = "/phieumuon";
        },
        error: function (err) {
            alert("Lỗi: " + JSON.stringify(err.responseJSON));
        }
    });
}


