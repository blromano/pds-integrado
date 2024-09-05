function addImage(pk) {
    alert("addImage: " + pk);
}

$('#myModal .save').click(function (e) {
    e.preventDefault();
    addImage(5);
    $('#myModal').modal('hide');
    //$(this).tab('show')
    return false;
})

sendEvent = function(sel, step) {
    var sel_event = new CustomEvent('next.m.' + step, {detail: {step: step}});
    window.dispatchEvent(sel_event);
}
