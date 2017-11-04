var random = Math.floor(Math.random() * 5);
    switch (random) {
        case 0:
        $(function () {
            toastr.options.timeOut = 5000;
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            Command: toastr["info"]("ゲストユーザーです。会員登録をすれば自分のローカルテーブルを持つことができます", "こんにちは！");
            $('#linkButton').click(function () {
                toastr.success('click');
            });
        });
        break;

        case 1: $(function () {
            toastr.options.timeOut = 5000;
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            Command: toastr["info"]("会員登録は無料です", "いかがですか？");
            $('#linkButton').click(function () {
                toastr.success('click');
            });
        });
        break;
    }


