<div id="mainWrap" class="mainWrap">
    <div class="mainSection">
        <div class="main">

            <div class="row mx-5" style="gap:10px">
                <div class="col-12">
                    <div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Chọn khách hàng">
                        <select class="form-select" title="Chọn khách hàng">
                            <option value="" disabled selected>Chọn khách hàng</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Chọn sản phẩm">
                        <select id="modalProduct" class="form-select" data-live-search="true" title="Chọn sản phẩm">
                        </select>
                    </div>
                </div>


                <div class="col-12">
                    <div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Chọn biến thể">
                        <select id="modalBienThe" class="form-select" data-dropup-auto="false" data-live-search="true"
                            title="Chọn biến thể" name="receiver">
                            <option value="">Chọn biến thể</option>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Chọn tùy biến">
                        <select id="modalTuyBien" class="form-select" data-dropup-auto="false" title="Chọn tùy biến"
                            data-width="100%" name="status">
                            <option value="">Chọn tùy biến</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script>
    $.getJSON('/data/data.json', function(data) {
        const product = $("#modalProduct");
        const bienThe = $("#modalBienThe");
        const tuyBien = $("#modalTuyBien");
        product.append($("<option>", {
            value: "",
            text: "Chọn sản phẩm",
            selected: true,
            disabled: true
        }));
        data.forEach((option) => {
            product.append($("<option>", {
                value: option.product_id,
                text: option.name,
            }));
        });

        product.change(function() {
            tuyBien.empty();
            bienThe.empty();
            data.forEach((option) => {
                console.log(option.product_id);
                if ($(this).val() == option.product_id) {
                    var bienthe_data = option.bienThes;
                    bienThe.append($("<option>", {
                        value: "",
                        text: "Chọn biến thể",
                        selected: true,
                        disabled: true
                    }));
                    bienthe_data.forEach((option) => {
                        bienThe.append($("<option>", {
                            value: option.bienthe_id,
                            text: option.name
                        }));
                    });
                }
            });
        });

        bienThe.change(function() {
            tuyBien.empty();
            data.forEach((option) => {
                var bienthe_data = option.bienThes;
                bienthe_data.forEach((option) => {
                    if ($(this).val() == option.bienthe_id) {
                        tuyBien.append($("<option>", {
                            value: "",
                            text: "Chọn tùy biến",
                            selected: true,
                            disabled: true
                        }));
                        var tuybien_data = option.tuybiens;
                        tuybien_data.forEach((option) => {
                            tuyBien.append($("<option>", {
                                value: option.tuybien_id,
                                text: option.name
                            }));
                        });
                    }
                });
            });
        });
    });
</script>
