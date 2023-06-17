let FilterS = document.getElementById('FilteraDropBox');

FilterS.addEventListener("change" , function() {

    let idgroup = this.value || this.options[this.selectedIndex].value;;
    window.location.href =  window.location.href.split('?')[0]+'?groupID='+ idgroup ;

});


document.querySelectorAll('.btn-delete').forEach((button) => {
    button.addEventListener('click', function(event) {
            event.preventDefault()

                if(confirm('<<< Are you sure >>>')) {

                   let action =  this.getAttribute('href');
                   let form = document.getElementById('form-delet');

                   form.setAttribute('action',action);
                   form.submit();
                }
    } );
});
