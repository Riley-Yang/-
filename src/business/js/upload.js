addEvent(window,"load",()=>{
    var $ = id => { return document.getElementById(id); };
    // 添加菜品分类
    var styleName = $("styleName");
    var styleDes = $("styleDes");
    var styleSave=$("styleSave");
    // 添加菜品
    var addcai=$("addcai");
    var caiName = $("caiName");
    var caiDes = $("caiDes");
    var caiStyle = $("caiStyle");
    var caiPrice = $("caiPrice");
    var hePrice = $("hePrice");
    var dang = $("dang");
    var max = $("max");
    var upImg = $("upImg");
    var saveCai=$("saveCai");
    var form=document.getElementById("form");
    // 添加菜品分类
    addEvent(styleSave,"click",()=>{
        if(styleName.value!=""){
            data = '{"styleName":"' + styleName.value + '","styleDes":"' + styleDes.value + '"}';
            ajax("POST", "../php/uploadstyle.php", returnData => {
                var json = JSON.parse(returnData);
                console.log(json)
                if (json.status == "10001") {
                    console.log(json.message);
                    alert("添加分类成功")
                    styleName.value = "";
                }
            }, "json", data);
        }else{
            alert("分类名称为空");
        }
        
    });
    // 添加菜品
        // 请求菜品分类
    addEvent(addcai,'click',()=>{
        ajax("POST","../php/caistyle.php",caiStyleR=>{
            var arr=caiStyleR.split(";");
            for(var i=0,len=arr.length-1;i<len;i++){
                var json=JSON.parse(arr[i]);
                console.log(json.message);
                caiStyle.innerHTML += '<option value="'+i+'">' + json.message + '</option>';
            }
        },"json");
    });
})