 function del(smg) {
    if (window.confirm(smg)) {
        return true;
    } else {
        return false;
    }
}

jQuery( '.article-ckeditor' ).each(function() {
    CKEDITOR.replace(this,{
        language:'en-gb',
        filebrowserImageUploadUrl : ''+window.location+'/public/assets/upload?type=Images&_token=',
        filebrowserBrowseUrl : ''+window.location+'/public/assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : ''+window.location+'/public/assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : ''+window.location+'/public/assets/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });
});
function myFunction() {
    document.getElementById('myForm').reset();
}
 function open_popup(url){
      var w = 1180;
      var h = 770;
      var l = Math.floor((screen.width-w)/2);
      var t = Math.floor((screen.height-h)/2);
      var win = window.open( url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l );
}
$(document).ready(function() {
    $('div.alert').delay(2000).slideUp();

    window.lastURL = $('#fieldID').val();
    setInterval(function () {
        if($('#fieldID').val() != window.lastURL) {
            var url = $('#fieldID').val();
            if(url == '')url = "assets/upload/config/no-image.png";
            $('.imagePreview').attr('src', url);
            window.lastURL = url;
        };
    });

// Phan Products
window.lastURL = $('#fieldID_img').val();
setInterval(function () {
    if($('#fieldID_img').val() != window.lastURL) {
        var url =  $('#fieldID_img').val();
        if(url == '')url = "assets/upload/config/no-image.png";
        $('.imagePreview_img').attr('src', url);
        window.lastURL = url;
    };
});
// Section Img-color
$(document).ready(function() {
   window.lastURL = $('#fieldID_img_color').val();
   setInterval(function () {
    if($('#fieldID_img_color').val() != window.lastURL) {
        var url =  $('#fieldID_img_color').val();
        if(url == '')url = "assets/upload/config/no-image.png";
        $('.Preview_img_color').attr('src', url);
        window.lastURL = url;
    };
});
});

$(function () {
    $( '.input_slug' ).keyup(function () {
        var text = $(this).val();
        text = text.toLowerCase();
        var text_create;
        text_create = text.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a").replace(/\ /g, '-').replace(/đ/g, "d").replace(/đ/g, "d").replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y").replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u").replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ.+/g,"o").replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ.+/g, "e").replace(/ì|í|ị|ỉ|ĩ/g,"i");
        var content = text_create.replace(' ', '-');
        $('.output_slug').val(content);
    }).keyup();
});

$(function () {
    $( '.input_slug_vi' ).keyup(function () {
        var text = $(this).val();
        text = text.toLowerCase();
        var text_create;
        text_create = text.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a").replace(/\ /g, '-').replace(/đ/g, "d").replace(/đ/g, "d").replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y").replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u").replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ.+/g,"o").replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ.+/g, "e").replace(/ì|í|ị|ỉ|ĩ/g,"i");
        var content = text_create.replace(' ', '-');
        $('.output_slug_vi').val(content.toLowerCase());
    }).keyup();
});
// Phan add Products - options
$('.add_products').click(function() {
  var html = $('#list_add_pro li').html();
  $('#list_add_pro').append('<li>'+html+'</li>');
});

$('#list_add_pro').on('click', '.del_pro_options', function() {
   if (!confirm('Bạn chắc chắn muốn xóa')) {
       return false;
   }else{
    $(this).closest('li').remove();
}
});


// Phan add Products - img - color - options
var count = 1;
$('.add_products_color').click(function() {
  count += 1;
  var url = "javascript:open_popup('http://localhost/assets/filemanager/dialog.php?type=1&popup=1&field_id=fieldID_img_color"+count +"')";
  var html ='<li>';
  html  +='<div class="col-md-2 col-sm-2 col-xs-3" >';
  html  +='<a style="height: 100%; margin-bottom: 0px;"  href="'+url+'" class="thumbnail"><img class="Preview_img_color'+count +'" src="assets/upload/config/no-image.png" alt=""> </a><small>* images color product</small> <input id="fieldID_img_color'+count +'" type="hidden" value="" name="color[]" /><a href="'+url+'">';
  html  +='<button style="margin-bottom: 10px" type="button" class="btn btn-sm btn-success">Choose IMG</button> </a><button style="float: right" type="button" class="btn btn-sm btn-danger del_pro_img"><i class="fa fa-trash" style=""></i></button>';
  html  +='</div>';
  html  +='</li>';
  $('#list_img_pro_color').append(html);

  window.lastURL = $('#fieldID_img_color'+count+'').val();
  setInterval(function () {
    if($('#fieldID_img_color'+count+'').val() != window.lastURL) {
        var url =  $('#fieldID_img_color'+count+'').val();
        if(url == '')url = "assets/upload/config/no-image.png";
        $('.Preview_img_color'+count+'').attr('src', url);
        window.lastURL = url;
    };
});
});
$('#list_img_pro_color').on('click', '.del_pro_img', function() {
   if (!confirm('Bạn chắc chắn muốn xóa')) {
       return false;
   }else{
    $(this).closest('li').remove();
}
});
});

// Phần config




