var checkBoxGroup = document.forms['form']['articles[]'];
var limit = 3
for (var i = 0; i < checkBoxGroup.length; i++) {
    checkBoxGroup[i].onclick = function () {
        var checkedcount = 0;
        for (var i = 0; i < checkBoxGroup.length; i++) {
            checkedcount += (checkBoxGroup[i].checked) ? 1 : 0;
        }
        if (checkedcount > limit) {
            document.getElementById('tooMuchArticles').innerHTML= "Vous ne pouvez cochez que " + limit + " cases.";
            this.checked = false;
        } else if(checkedcount <= limit) {
            document.getElementById('tooMuchArticles').innerHTML= "";
        }
    }
}