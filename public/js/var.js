notificacion = function (mensaje,tipo = 'info',dlay = true){
    // Available types 'warning', 'info', 'success', 'error'
    Lobibox.notify(tipo, {
        size: 'mini',
        icon: false,
        delayIndicator: dlay,
        msg: mensaje,
        sound: false
    });
};

validar = function(t, marca = true, visible = true) {
    let flag = 1;
    $(t).find('*[required]').each(function(){
        if($(this).is(":visible")) {
            if($(this).is(":invalid") || $(this).val() == "") {
                flag = 0;
            }
        }
    });
    return flag;
};

// php artisan config:clear
// php artisan cache:clear
// php artisan migrate:fresh
// php artisan tinker
// php artisan r:l