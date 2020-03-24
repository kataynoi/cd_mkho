$(function () {

    var report = {};
    report.ajax = {

        get_ita: function (year, cb) {
            var url = '/welcome/get_ita',
                params = {
                    year: year
                };

            app.ajax(url, params, function (err, data) {
                err ? cb(err) : cb(null, data);
            });
        }
    }

});



