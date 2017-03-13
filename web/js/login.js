$('#login_button').click(function () {
    var username = $('#username').val();
    var password = $('#password').val();
    if (!username) {
        alert('用户名不能为空');
        return;
    }
    if (!password) {
        alert('密码不能为空');
        return;
    }
    $.ajax({
        type: 'POST',
        url: '/login/auth',
        data: {username: username, password: password, _csrf: $('#_csrf').val()},
        dataType: 'json',
        success: function (data) {
            console.log(data)
            if (data && data.errno == 0) {
                location.href = "/app/index";
            } else {
                alert(data.errmsg ? data.errmsg : '系统异常,请稍后再试')
            }
        },
        error: function () {
            alert('网络不好,请稍后再试')
        }
    })

});