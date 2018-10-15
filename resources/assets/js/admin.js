 function del_pro(smg) {
    if (window.confirm(smg)) {
        return true;
    } else {
        return false;
    }
}

$(document).ready(function() {
    $(".article-ckeditor").each(function() {
    CKEDITOR.replace(this,{
        language:'en-gb',
        filebrowserImageUploadUrl : ''+window.location+'/public/assets/upload?type=Images&_token=',
        filebrowserBrowseUrl : ''+window.location+'/public/assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : ''+window.location+'/public/assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : ''+window.location+'/public/assets/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });
});

CKEDITOR.config.contentsCss = ''+window.location+'/public/ckeditor/plugins/fontawesome/font-awesome/css/font-awesome.min.css';
});


  function myFunction() {
    document.getElementById("myForm").reset();
}
