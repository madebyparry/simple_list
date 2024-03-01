function check_item(item) {
    var item_class = '.'+item.name; 
    console.log('item clicked ' + item.name);
    var item_label = item.parentNode.querySelector(item_class);
    console.log(item_label);
    item_label.classList.toggle('checked');
}

function check_existing() {
    var checkboxes = document.getElementsByClassName('list_item_checkbox');
    for (let i = 0; i < checkboxes.length; i++) {
        var item = checkboxes[i];
        if (item.checked) {
            console.log(item.name + ' is checked');
            var item_class = '.'+item.name; 
            var item_label = item.parentNode.querySelector(item_class);
            item_label.classList.add('checked');
        }
    }   
}
function cache_clear() {
    console.log('js caches cleared');
    caches.delete();
}

function toggle_menu() {
    console.log('menu toggled');
    let site_nav = document.getElementById('site-nav');
    site_nav.classList.toggle('reveal');
}
check_existing();
cache_clear();
