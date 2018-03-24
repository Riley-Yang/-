function ajax(method,url,success,data){
    //1.创建ajax对象
    var xmlHttp=null;
    if(window.XMLHttpRequest){
        xmlHttp=new XMLHttpRequest();
    }else{
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    //2.准备数据data
    //3.设置请求方式和地址
    xmlHttp.open(method,url);
    //4.设置数据编码
    xmlHttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
    //5.绑定onreadystatechange
    xmlHttp.onreadystatechange=()=>{
        if(xmlHttp.readyState==4 && xmlHttp.status==200){
            success(xmlHttp.responseText);
        }
    };
    //6.发送请求
    if(data){
        xmlHttp.send(data);
    }else{
        xmlHttp.send();
    }
}





//6.发送请求