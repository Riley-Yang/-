addEvent(window, 'load', () => {
    let $ = id => { return document.getElementById(id) }
    let quit = $("quit");
    addEvent(quit, "click", () => {
        ajax("POST", "../../common/php/safeout.php", returnData => {
            let json = JSON.parse(returnData);
            if (json.status == "10001") {
                location.href = "./login.html";
            }
        }, "json");
    });
});