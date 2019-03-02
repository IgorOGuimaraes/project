var core_errors = [];
var FrameworkApp = {
    name: 'Framework',
    app: 'framework',
    version: "1.0.0b",
    error_log: [],
    init: function () {

        $('select').select();
        $('.modal').modal();

        $(".dropdown-trigger").dropdown();
        $('.collapsible').collapsible();

        $('.sidenav').sidenav({
            'edge': 'left'
        });
        $('#side-nav').on('click',function () {
            $('.sidenav').sidenav('open');
        });
        $(document.body).on('click', '#core-report', function () {
            M.Toast.dismissAll();
            FrameworkApp.reportError();
        });

    },
    changeLanguage:function (language) {
        $.ajax(
            {
                type: "POST",
                url: "/" + this.app + "/dashboard/changeLanguage",
                data: {language: language},
                success: function (data) {
                    location.reload();
                },
                error: function (a, b) {
                    console.log(a);
                    console.log(b);
                    M.toast({html: 'Error changing languages, please try again later', displayLength: 2000})
                }
            }
        );
    },
    notification: function (title, description) {

        if (!("Notification" in window)) {
            alert("Your Browser does not support all features, we recommend chrome,firefox or opera on the latest version");
        }

        else if (Notification.permission === "granted") {

            var notification = new Notification(
                title,
                {
                    body: description,
                    icon: '/' + this.app + '/assets/img/Core/logo-dat-med.png'
                }
            );
        }

        else if (Notification.permission !== "denied") {
            Notification.requestPermission(function (permission) {
                if (permission === "granted") {
                    var notification = new Notification(
                        title,
                        {
                            body: description,
                            icon: '/' + this.app + '/assets/img/Core/logo-dat-med.png'
                        }
                    );
                }
            });
        }

    },
    setLocal: function (key, value) {
        localStorage.setItem(key, value);
        return true;
    },
    getLocal: function (key) {
        return localStorage.getItem(key);
    },
    setSession: function (key, value) {
        sessionStorage.setItem(key, value);
        return true;
    },
    getSession: function (key) {
        return sessionStorage.getItem(key);
    },
    registerError: function (error) {
        this.error_log.push(error);
        return true;
    },
    getError: function () {
        return this.error_log;
    },
    reportError: function () {
        $.ajax({
            type: "POST",
            url: "/" + this.app + "/",
            success: function (d) {
                Materialize.toast('Error Reported!', 5000);
                return d;
            },
            error: function (e, d) {
                Materialize.toast('Could not report error', 5000);
                return d;
            }
        });
    },
    blockUser: function () {

        $('#block-loader').css('display','block');
    },
    unblockUser: function () {

        $('#block-loader').css('display','none');
    },
    loadBlock: function (type, percent,message) {

        $('#progress-loader-percent').removeClass('indeterminate');
        $('#progress-loader-percent').removeClass('determinate');
        $('#progress-loader').css('display','block');
        $('#progress-loader-percent').addClass(type);
        $('#progress-loader-percent').css('width',percent);
        $('#progress-loader-content').html(message);
    },
    loadUnblock: function () {

        $('#progress-loader').css('display','none');
    },
    getPercente: function(num, amount){
        return Math.floor((num / amount) * 100);
    }
};

$('.change-language').on('click',function () {
   FrameworkApp.changeLanguage($(this).attr('data-id'));
});

FrameworkApp.init();










