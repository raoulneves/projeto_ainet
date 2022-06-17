$('#edit_profile_form').validate({
    ignore:'.ignore',
    errorClass:'invalid',
    validClass:'success',
    rules:{
        old_password:{
            required:true,
            minlength:6,
            maxlength:100
        },
        new_password:{
            required:true,
            minlength:6,
            maxlength:100
        },
        confirm_password:{
            required:true,
            equalTo:'#new_password'
        },
    },
    messages: {
        old_password:{
            required:"Coloque a password atual"
        },
        new_password:{
            required:"Coloque a passwoed nova"
        },
        confirm_password:{
            required:"Confirme a password nova"
        },
    },
    submitHandler:function(form){
        $.LoadingOverlay("show");
        form.submit();
    }
});
