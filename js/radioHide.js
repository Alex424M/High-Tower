$("input[name='radio1']").click(function () {
    if ($(this).attr("id") == "radio-9") {
        $(".left-block__metro").hide();
        $("#params__floor").hide();

    } else {
        $(".left-block__metro").show();
        $("#params__floor").show();
    }
});