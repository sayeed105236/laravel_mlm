$(document).ready(function () {
    selectToMe('');//for select to me
   // $('.chosen-select').chosen({width: "100%"}); //for multi select
});
/*select to me*/
function selectToMe(placeHolderText) {
    var first_char = placeHolderText.charAt(0);
    if (first_char == '#') {
        selectToMe_id(placeHolderText);
    } else if (first_char == '') {
        selectToMe_empty();
    } else {
        $(".select2Me").select2({
            placeholder: placeHolderText,
            allowClear : true
        });
    }

}

function selectToMe_empty() {
    $(".select2Me").select2({
        placeholder: "Select an Option",
        allowClear : true
    });
}

function selectToMe_id(id) {
    $(id).select2({
        placeholder: "Select an Option",
        allowClear : true
    });
}
