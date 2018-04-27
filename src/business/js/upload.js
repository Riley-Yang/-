addEvent(window,"load",()=>{
    let $ = id => { return document.getElementById(id); };
    // 添加菜品分类
    let styleName = $("styleName");
    let styleDes = $("styleDes");
    let styleSave=$("styleSave");
    // 添加菜品
    let addcai=$("addcai");
    let caiName = $("caiName");
    let caiDes = $("caiDes");
    let caiStyle = $("caiStyle");
    let caiPrice = $("caiPrice");
    let hePrice = $("hePrice");
    let dang = $("dang");
    let max = $("max");
    let upImg = $("upImg");
    let saveCai=$("saveCai");
    let form=document.getElementById("form");
    
    // 添加菜品
        // 请求菜品分类
    addEvent(addcai,'click',()=>{
        ajax("POST","../php/caistyle.php",caiStyleR=>{
            let arr=caiStyleR.split(";");
            for(let i=0,len=arr.length-1;i<len;i++){
                let json=JSON.parse(arr[i]);
                console.log(json.styleId+json.styleName);
                caiStyle.innerHTML += '<option value="' + json.styleId + '">' + json.styleName + '</option>';
            }
        },"json");
    });
    
})