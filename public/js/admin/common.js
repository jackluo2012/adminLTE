/*通用ajax提交*/
function ajaxConfirm(data,url, funSuccess){
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        success: function(data){
            funSuccess(data);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("error");
        }
    });
}

/**
 * ajax删除列表
 * @param url
 * @param id
 */
function ajaxDeleteItem(url, id){
    var obj = new Object();
    obj.id = id;
    ajaxConfirm(obj, url, ajaxDeleteItemSuccess);
}

function ajaxDeleteItemSuccess(data){
    if(data.status == 2){
        alert(data.msg);
        var id = data.data.id;
        var operation = data.data.operation;
        if(operation) {
            eval(operation);
        } else {
            $('#list_'+id).remove();
        }
    }else{
        alert(data.msg);
    }
}