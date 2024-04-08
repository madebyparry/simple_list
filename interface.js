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

function checks_to_local_storage(){
	var checked_cache = $('input[type=checkbox]:checked').map(function(){
        return this.value;
    }).get();
    localStorage['checked_items_cache']=JSON.stringify(checked_cache);
}
function checks_from_local_storage(){
    if(localStorage&&localStorage["checked_items_cache"]){
        var localStoredData=JSON.parse(localStorage["checked_items_cache"]);
        var checkboxes=document.getElementsByClassName('list_item_checkbox');
        for(var i=0;i<checkboxes.length;i++){
            for(var j=0;j<localStoredData.length;j++){
                if(checkboxes[i].value==localStoredData[j]){
                    checkboxes[i].checked=true;
                }
            }
        }
        localStorage.removeItem('checked_items_cache');
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

function close_status() {
    console.log('status toggled');
    stat = document.getElementById('status-message');
    stat.classList.add('hidden');
}


switch (document.readyState) {
  case "loading":
    console.log('readystate - loading'); 
    break;
  case "interactive": {
    console.log('readystate - interactive'); 
    break;
  }
  case "complete":
    console.log('readystate - complete'); 
    console.log(
      `The first CSS rule is: ${document.styleSheets[0].cssRules[0].cssText}`,
    );
    check_existing();
    checks_to_local_storage();
    checks_from_local_storage();
    break;
}

window.onload = "check_existing()";
window.onload = "check_from_local_storage()";
window.onload = "check_to_local_storage()";
