// Select2
One.helpersOnLoad(['jq-select2']);


// Rich Text Editor
var editor1 = new RichTextEditor("#description");


// Tooltips
document.addEventListener("DOMContentLoaded", function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
});


// Get Subcategories
$('#category').on('change', function () {

    let categoryId = $(this).val();

    let subcategory = $('#subcategory');

    subcategory.html('<option value="">Loading...</option>');

    fetch('/admin/product/get-subcategories/' + categoryId)
        .then(response => response.json())
        .then(data => {

            let options = '<option value="">Select Sub Category</option>';

            data.forEach(function (item) {
                options += `<option value="${item.id}">${item.name}</option>`;
            });

            subcategory.html(options).trigger('change');

        });

});


// Generate SKU
document.addEventListener("DOMContentLoaded", function () {

    function generateNumericSKU(length = 8) {
        // Only digits 0-9
        let code = '';
        const digits = '0123456789';
        for (let i = 0; i < length; i++) {
            code += digits.charAt(Math.floor(Math.random() * digits.length));
        }
        return code;
    }

    const btn = document.getElementById('generate_code');
    const skuInput = document.getElementById('sku');

    btn.addEventListener('click', function () {
        const code = generateNumericSKU(8);
        skuInput.value = code;
    });

});


// Variation show/hide
document.addEventListener("DOMContentLoaded", function () {

    const toggle = document.getElementById("status");
    const variationBody = document.getElementById("variationBody");

    toggle.addEventListener("change", function () {

        if (this.checked) {
            variationBody.style.display = "block";
        } else {
            variationBody.style.display = "none";
        }
    });
});

// Variation



// Thumbnail Image Upload
document.addEventListener("DOMContentLoaded", function () {
    const thumbnailBox = document.getElementById("thumbnailBox");
    const thumbnailInput = document.getElementById("thumbnailInput");
    const thumbnailPreview = document.getElementById("thumbnailPreview");
    const thumbnailText = document.getElementById("thumbnailText");

    thumbnailBox.onclick = () => thumbnailInput.click();
    thumbnailInput.addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                thumbnailPreview.src = e.target.result;
                thumbnailPreview.style.display = "block";
                thumbnailText.style.display = "none";
            };
            reader.readAsDataURL(file);
        }
    });
});


// Multiple Image Upload
document.addEventListener("DOMContentLoaded", function () {

    const container = document.getElementById("imagePreviewContainer");

    function createUploadBox() {

        const box = document.createElement("div");
        box.classList.add("image-box");
        box.style.width = "200px";
        box.style.height = "200px";
        box.style.border = "2px dashed #ccc";
        box.style.borderRadius = "8px";
        box.style.position = "relative";
        box.style.cursor = "pointer";
        box.style.display = "flex";
        box.style.alignItems = "center";
        box.style.justifyContent = "center";
        box.style.background = "#fff";

        const input = document.createElement("input");
        input.type = "file";
        input.name = "gallery[]";
        input.accept = "image/png,image/jpeg";
        input.hidden = true;

        const text = document.createElement("span");
        text.innerHTML = "Upload Image";

        box.appendChild(text);
        box.appendChild(input);

        box.onclick = () => input.click();

        input.addEventListener("change", function () {

            if (!this.files || this.files.length === 0) {
                return;
            }

            const file = this.files[0];

            const reader = new FileReader();

            reader.onload = function (e) {

                box.innerHTML = `
                    <img src="${e.target.result}"
                    style="width:100%;height:100%;object-fit:cover;border-radius:6px;">

                    <button type="button"
                    style="position:absolute;top:5px;right:5px;background:red;color:white;border:none;border-radius:50%;width:25px;height:25px;">
                    ×
                    </button>
                `;

                box.appendChild(input);

                box.querySelector("button").onclick = function (ev) {
                    ev.stopPropagation();
                    box.remove();
                };

                createUploadBox();
            };

            reader.readAsDataURL(file);
        });

        container.appendChild(box);
    }

    // initial upload box
    createUploadBox();

});


// Meta Image Upload
document.addEventListener("DOMContentLoaded", function () {
    const metaImgBox = document.getElementById("metaImgBox");
    const metaImgInput = document.getElementById("metaImgInput");
    const metaImgPreview = document.getElementById("metaImgPreview");
    const metaImgText = document.getElementById("metaImgText");

    metaImgBox.onclick = () => metaImgInput.click();
    metaImgInput.addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                metaImgPreview.src = e.target.result;
                metaImgPreview.style.display = "block";
                metaImgText.style.display = "none";
            };
            reader.readAsDataURL(file);
        }
    });
});


// Meta Title Sync with Name
document.addEventListener("DOMContentLoaded", function () {
    const nameInput = document.getElementById("name");
    const metaTitle = document.querySelector("input[name='meta_title']");
    nameInput.addEventListener("input", function () {
        metaTitle.value = this.value;
    });
});


// Reset Form Button
document.getElementById("resetFormBtn").addEventListener("click", function () {
    document.getElementById("productForm").reset();
});



// Pagination 
let currentPage = 1;
let currentSearch = "";

function loadOrders(reset = false) {
    let button = $("#loadMore");

    button.find('.btn-text').addClass('d-none');
    button.find('.spinner-border').removeClass('d-none');

    $.ajax({
        url: "{{ route('admin.product.getList.ajax') }}",
        data: {
            page: currentPage,
            search: currentSearch,
        },
        cache: false, // ✅ cache বন্ধ
        success: function (res) {
            if (reset) {
                $("#tableBody").html("");
            }
            $("#tableBody").append(res.data);

            if (!res.hasMore) {
                button.hide();
            } else {
                button.show();
            }
        },
        complete: function () {
            button.find('.btn-text').removeClass('d-none');
            button.find('.spinner-border').addClass('d-none');
        }
    });
}

// প্রথমবার লোড
loadOrders(true);

// Load More
$("#loadMore").on("click", function () {
    currentPage++;
    loadOrders();
});

// ✅ Search input
$("#productSearch").on("keyup", function () {
    currentSearch = $(this).val();
    currentPage = 1;
    loadOrders(true);
});
