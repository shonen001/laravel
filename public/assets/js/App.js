let FilterS = document.getElementById('FilteraDropBox');

FilterS.addEventListener("change" , function() {

    let idgroup = this.value || this.options[this.selectedIndex].value;;
    window.location.href =  window.location.href.split('?')[0]+'?groupID='+ idgroup ;

});
