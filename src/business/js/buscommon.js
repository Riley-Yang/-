addEvent(window,'load',()=>{
    var $=id=>{return document.getElementById(id);};
    var noUser=$("noUser");
    var userName = $("userName");
    // 获取用户名
    ajax("POST","../php/validate.php",returnData=>{
        var json=JSON.parse(returnData);
        if(json.status=="10001"){
            userName.innerHTML = json.message;
        }
    },"json");
})