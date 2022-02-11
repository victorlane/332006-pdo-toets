const btns = document.getElementsByClassName("editBtn");
var clicked = null;
var id = null;

for(let item of btns) {
    item.addEventListener("click", (item) => {
        let id = item.explicitOriginalTarget.attributes.id.nodeValue;
        const items = document.querySelectorAll(`[id="${id}"]`);
        if(clicked == id) return;
        clicked = id
        
        for(let node of items) {
            if(node.alt == "Edit") {
                node.setAttribute("src", "img/s_success.png");
                node.setAttribute("onclick", "update()");
            } else {
                node.innerHTML = `<input type="text" value="${node.innerHTML}">`;
            }
        }
    });
}

function update() {
    let id = btns[0].id;
    let items = document.querySelectorAll(`[id="${id}"]`);
    console.log(items)
};