function ajax(method, url, success, dataType, data) {
    //method 请求方法
    //dataType 发送给服务器的数据类型
    //data 发送给服务器的数据
    //success 数据成功返回后的回调函数
    var xmlHttp = null;//创建一个空对象
    //1.创建ajax对象
    if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
    } else {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    //2.设置请求目标地址和请求方法
    if (method == "GET" && data != undefined) {
        xmlHttp.open(method, url + "?" + data);
    } else {
        xmlHttp.open(method, url);
    }

    //3.设置发送的请求参数的数据格式
    if (dataType == "urlencode") {
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    }
    if (dataType == "json") {
        xmlHttp.setRequestHeader("Content-type", "application/json");
    }
    //4.绑定事件onreadystatechange
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            success(xmlHttp.responseText);
        }
    }
    //5.发送请求
    if (data == undefined || method == "GET") {
        xmlHttp.send();
    } else {
        xmlHttp.send(data);
    }
}
