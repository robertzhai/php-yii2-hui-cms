$('#modify_button').click(function () {
    var url = $('#url').val();
    var pid = $('#pid').val();
    if (!url) {
        alert('菜单地址不能为空');
        return;
    }
    if (!pid) {
        alert('页面错误,请刷新重试');
        return;
    }
    $.ajax({
        type: 'POST',
        url: '/health/edit',
        data: {url: url, id: pid, _csrf: $('#_csrf').val()},
        dataType: 'json',
        success: function (data) {
            console.log(data)
            if (data && data.errno == 0) {
                location.href = "/health/index";
            } else {
                alert(data.errmsg ? data.errmsg : '系统异常,请稍后再试')
            }
        },
        error: function () {
            alert('网络不好,请稍后再试')
        }
    })

});