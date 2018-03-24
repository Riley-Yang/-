function addEvent(ele,eventType,func){
    //ele DOM对象
    //eventType 事件类型
    //func 处理函数
    try {
        if (ele != null && typeof ele == 'object') {
            if (-[1,]) {
                //ie9+
                ele.addEventListener(eventType, func);
            } else {
                //ie6/7/8
                ele.attachEvent("on" + eventType, func);
            }
        } else {
            throw new Error("对象为空或不是对象");
        }
    } catch (error) {
        console.loe(error.message);
    }
}