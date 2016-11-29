jQuery(document).ready(function($){
	
    //открытие модального окна
	$('.open_modal, .registration-button, .standart-page-reg-button, .corner-registration-button').click(function (e){
		e.preventDefault();
		$('.popup, .overlay, .form-wrapper').css({'opacity':'1', 'display':'block'});
	});
	
    //закрытие модального окна
	$('.close_modal, .overlay').click(function (){
		
		$('.popup, .overlay, .form-wrapper').css({'opacity':'0', 'display':'none'});
		$('.popup > .reg-form textarea').val('');
		
	});

	$("form").submit(function () {
        // Получение ID формы
        var formID = $(this).attr('id');
        // Добавление решётки к имени ID
        var formNm = $('#' + formID);
        
        $.ajax({
            type: "POST",
            url: 'mail.php',
            data: formNm.serialize(),
            success: function (data) {

                $(formNm).html(data);
            },
            error: function (jqXHR, text, error) {

                $(formNm).html(error);
            }
        });
        
        document.getElementById("form").reset();
        
        return false;
    });
});

