
ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
$(function () {
    // put jquery code here
    $("input[name='checkAllBoxes']").click(function () {
        // $("input[name='checkboxValues[]']").checked = true;
        // $(".checkBoxes").checked = true;
        if($(this).is(":checked")){

            $(".checkBoxes").prop( "checked", true );
        } else{
            
            $(".checkBoxes").prop( "checked", false );
        }
        // alert("hello");

    });
});
// function selects(event) {
//     // alert("pashm");
//     // var elem = document.getElementsByClassName("checkBoxes");
//     var elem = document.getElementsByName("checkboxValues[]");
//     // console.log(elem.length);
//     if (event.checked == true) {
//         elem.forEach(element => {
//             element.checked = true;
//         });
//     } else {
//         elem.forEach(element => {
//             element.checked = false;
//         });
//     }
// }