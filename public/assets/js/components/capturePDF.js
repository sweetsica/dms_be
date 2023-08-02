const btnsPrint = document.querySelectorAll(".btnPrint");
btnsPrint.forEach((btn) => {
    btn.addEventListener("click", () => {
        const content = btn.dataset.content;
        console.log(content);
        console.log("print");

        // Ẩn element với class no-print khi in
        const noPrintElements = document.querySelectorAll(".no-print");
        noPrintElements.forEach((element) => {
            element.style.setProperty("display", "none", "important");
        });
        
        // Bỏ viền của input khi in
        const noBorderInputs = document.querySelectorAll(".input-print");
        noBorderInputs.forEach((element) => {
            element.style.setProperty("border", "none", "important");
        });

        printContent(content);
    });
});
function printContent(elementId) {
    var printContents = document.getElementById(elementId).innerHTML;
    var wrappedContent = '<div class="print_wrapper"><div class="print_container">' + printContents + '</div></div>';
    document.body.innerHTML = wrappedContent;
    window.print();

    setTimeout(function () {
        window.location.reload();
    }, 1000);
}

// Hàm được gọi sau khi hoàn thành in
function afterPrint() {
    location.reload();
}

// // Đăng ký sự kiện afterprint
if (window.matchMedia) {
    var mediaQueryList = window.matchMedia("print");
    mediaQueryList.addListener(function (mql) {
        if (!mql.matches) {
            afterPrint();
        }
    });
}

window.onafterprint = afterPrint;
