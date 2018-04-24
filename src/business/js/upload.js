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
    
    // 添加菜品
        // 请求菜品分类
    addEvent(addcai,'click',()=>{
        ajax("POST","../php/caistyle.php",caiStyleR=>{
            var arr=caiStyleR.split(";");
            for(var i=0,len=arr.length-1;i<len;i++){
                var json=JSON.parse(arr[i]);
                console.log(json.styleId+json.styleName);
                caiStyle.innerHTML += '<option value="' + json.styleId + '">' + json.styleName + '</option>';
            }
        },"json");
    });
    
})