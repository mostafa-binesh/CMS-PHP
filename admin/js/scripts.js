
ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });


function selects(event) {
    // document.getElementById
    // var ele=document.getElementsByName('chk');  
    // getElementsById
    // document.write(this.checked);
    // var ele = document.getElementsByName('checkboxValues[]');

    // I couldn't make it with getelementsbyid
    var ele = document.getElementsByClassName('checkBoxes');
    // alert(ele.length);
    // console.log(event.checked);
    for (var i = 0; i < ele.length; i++) {
        if (ele[i].type == 'checkbox') {
            if (event.checked == true) {
                ele[i].checked = true;
            } else {
                // alert('checking');
                ele[i].checked = false;
            }
        }
    }
}

