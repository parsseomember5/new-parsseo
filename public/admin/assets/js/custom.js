let _token = $('meta[name="csrf-token"]').attr('content');

// image file remove button click (edit pages)
$(document).on('click','.remove-image-file',function (){
    let btn = $(this);
    let imageUrl = $(this).attr('data-url');
    let inp = $('#' + $(this).attr('input-id'));
    let img = $('#' + $(this).attr('image-id'));
    inp.val(imageUrl);
    img.remove();
    btn.remove();
});

// table item delete button click
$(document).on('click','.delete-row,.btn-fore-delete',function (){
    let button = $(this);
    let message = button.attr('data-alert-message');
    if (message === undefined || message === null) message = 'این کار قابل بازگشت نخواهد بود!';

    Swal.fire({
        title: 'آیا مطمئنید؟',
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'بله، حذف کن!',
        cancelButtonText: 'انصراف',
        customClass: {
            confirmButton: 'btn btn-danger me-3',
            cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
    }).then(function (result) {
        if (result.value) {
            if (button.hasClass('btn-fore-delete')){
                button.parent('form').submit();
            }else{
                button.find('form').submit();
            }
        }
    });
})

// edit pages delete button function
$(document).on('click','#edit-page-delete',function (){
    let button = $(this);
    let text = button.attr('data-alert-message');
    if (text === undefined || text === ''){
        text = 'این عمل قابل بازگشت نخواهد بود!';
    }
    Swal.fire({
        title: 'آیا مطمئنید؟',
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'بله، حذف کن!',
        cancelButtonText: 'انصراف',
        customClass: {
            confirmButton: 'btn btn-danger me-3',
            cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
    }).then(function (result) {
        if (result.value) {

            button.prop('disabled',true);
            button.html('<span class="spinner-grow align-middle" role="status" aria-hidden="true"></span> در حال حذف');

            let modelId = button.attr('data-model-id');
            let model = button.attr('data-model');
            let data = new FormData();
            data.append('id',modelId);

            $.ajax({
                method: 'POST',
                processData: false,
                contentType: false,
                url: '/admin/'+model+'/ajax-delete/',
                data: data,
                headers: {'X-CSRF-TOKEN': _token},
                error:function (e) {
                    console.log(e);
                    button.prop('disabled',false);
                    button.html('حذف نمونه کار');
                }
            }).done(function (data) {
                if (data === 'success'){
                    window.location.href = '/admin/' + model;
                }

            }).always(function () {
                button.prop('disabled',false);
                button.html('حذف نمونه کار');
            });
        }
    });
})

// add spinner to submit buttons on click
$(document).on('click','.submit-button',function (){
    let button = $(this);
    button.prop('disabled',true);
    button.html('<span class="spinner-grow align-middle" role="status" aria-hidden="true"></span> چند لحظه صبر کنید');
    button.parents('form').submit();
})

// trash empty button click
$(document).on('click','#btn-empty-trash',function (){
    let button = $(this);
    Swal.fire({
        title: 'آیا مطمئنید؟',
        text: "همه موارد موجود در سطل زباله برای همیشه حذف میشوند!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'بله، حذف کن!',
        cancelButtonText: 'انصراف',
        customClass: {
            confirmButton: 'btn btn-danger me-3',
            cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
    }).then(function (result) {
        if (result.value) {
            button.parent('form').submit();
        }
    });
})

// change language
$(document).on('change','.lang-switcher-select',function (){
    $(this).parent('form').submit();
});

$(document).on('click','.add-more-faq',function (){
    let container = $('#faq-items');
    let name = makeId(6);

    let el = "<div class='row align-items-end' id='faq_row_"+name+"'>";

    el += "<div class='mb-3 col-12'>" +
        "<label for='item_faq_"+name+"' class='form-label'>عنوان</label>" +
        "<input class='form-control' type='text' id='item_faq_"+name+"' name='item_faq_"+name+"[]'>" +
        "</div>";

    el += "<div class='mb-3 col-12'>" +
        "<label for='item_faq_"+name+"' class='form-label'>متن</label>" +
        "<textarea class='form-control' id='item_faq_"+name+"' name='item_faq_"+name+"[]'></textarea>" +
        "</div>";

    el += "<div class='mb-3 col-lg-2'><span class='btn btn-label-danger btn-remove-faq' data-delete='faq_row_"+name+"'><i class='bx bx-trash'></i></span></div>";

    el += "<div class='col-12'><hr></div></div>";
    container.append(el);
});
$(document).on('click','.btn-remove-faq',function (){
    let id = "#" + $(this).attr('data-delete');
    $(id).remove();
});

function makeId(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

// init select2
$(function () {
    const selectPicker = $('.selectpicker'),
        select2 = $('.select2'),
        select2Icons = $('.select2-icons');

    // Bootstrap Select
    // --------------------------------------------------------------------
    if (selectPicker.length) {
        selectPicker.selectpicker();
    }

    // Select2
    // --------------------------------------------------------------------

    // Default
    if (select2.length) {
        select2.each(function () {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>').select2({
                placeholder: 'انتخاب',
                dropdownParent: $this.parent()
            });
        });
    }

    // Select2 Icons
    if (select2Icons.length) {
        // custom template to render icons
        function renderIcons(option) {
            if (!option.id) {
                return option.text;
            }
            var $icon = "<i class='bx bxl-" + $(option.element).data('icon') + " me-2'></i>" + option.text;

            return $icon;
        }
        select2Icons.wrap('<div class="position-relative"></div>').select2({
            templateResult: renderIcons,
            templateSelection: renderIcons,
            escapeMarkup: function (es) {
                return es;
            }
        });
    }
});

// init tagify
(function () {
    // Basic
    //------------------------------------------------------
    const tagifyBasicEl = document.querySelector('.tagify-select');
    var tagify = new Tagify(tagifyBasicEl, {
        originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
    })

})();

// init editor
(function () {

    // Full Toolbar
    // --------------------------------------------------------------------
    // const fullToolbar = [
    //     ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    //     ['blockquote', 'code-block'],
    //
    //     [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    //     [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    //     [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
    //     [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
    //     [{ 'direction': 'rtl' }],                         // text direction
    //
    //     [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    //     [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
    //
    //     [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    //     [{ 'font': [] }],
    //     [{ 'align': [] }],
    //
    //     ['clean']
    // ];
    const fullToolbar = [
        [
            {
                font: []
            },
            {
                size: []
            }
        ],
        ['bold', 'italic', 'underline', 'strike'],
        [
            {
                color: []
            },
            {
                background: []
            }
        ],
        [
            {
                script: 'super'
            },
            {
                script: 'sub'
            }
        ],
        [
            {
                header: '1'
            },
            {
                header: '2'
            },
            'blockquote',
            'code-block'
        ],
        [
            {
                list: 'ordered'
            },
            {
                list: 'bullet'
            },
            {
                indent: '-1'
            },
            {
                indent: '+1'
            }
        ],
        [
            'direction',
            {
                align: []
            }
        ],
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        ['link', 'image', 'video', 'formula'],
        ['clean'],
    ];
    let editorEl = $('#main-editor');
    if (editorEl.length){
        const bodyEditor = new Quill('#main-editor', {
            bounds: '#main-editor',
            placeholder: 'چیزی بنویسید ...',
            modules: {
                formula: true,
                toolbar: fullToolbar
            },
            theme: 'snow'
        });

        // insert value to input
        bodyEditor.on('text-change', function(delta, oldDelta, source) {
            let inputId = $('#main-editor').attr('data-input-id');
            let html = bodyEditor.root.innerHTML;
            $('#' + inputId).val(html);
        });
    }

})();
