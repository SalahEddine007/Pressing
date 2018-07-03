$(function () {
    //clone
    $("#add").click(function() {
        $('#vetements #vetement:last').clone(true).insertBefore('#add_button');
        $('#vetements #vetement').last().find('input:text').val('');
        $('#vetements #vetement').last().find('#vetement_libelle').val('');
        $('#vetements #vetement').last().find('#vetement_description').val('');
        $('#vetements #vetement').last().find('#vetement_quantity').val('1');
        return false;
    });
    // total price calculate
    $('#vetement_quantity,#vetement_price').bind('keyup change' , function () {
        var textValue1 = $(this).closest('#vetement').find('.vetement_price').val();
        var textValue2 = $(this).closest('#vetement').find('.vetement_quantity').val();
        $(this).closest('#vetement').find('.total_price').val(textValue1 * textValue2);

        var sum = 0;
        $(".total_price").each(function () {
            sum += +$(this).val();
        });

        $("#montant").html('Montant Total: ' +sum);
    });

    // $('#categorie').change(function() {
    //     if($(this).val()!='')
    //     {
    //         $( "div:has(#categorie)").removeClass('is-invalid');
    //     }
    // });
    // $('#service').change(function() {
    //     if($(this).val()!='')
    //     {
    //         $( "div:has(#service)").removeClass('is-invalid');
    //     }
    // });

    // jQuery(function () {
    //     // Init page helpers (Select2 plugin)
    //     Codebase.helpers('select2');
    // });

    // $('#vetement_price').each(function() {
    //     if($(this).closest('#vetement').find('.vetement_price').val(''))
    //         $(this).css('border','1px solid red');
    // });

    // $('#client').change(function () {
    //     if($('#client').val()!=''){
    //         $('#client_name').prop('disabled', true);
    //         $('#client_tele').prop('disabled', true);
    //         $('#client_adresse').prop('disabled', true);
    //         $('#client_name').val('');
    //         $('#client_tele').val('');
    //         $('#client_adresse').val('');
    //         $(this).closest('.client').find('.form-group').removeClass('is-invalid');
    //         $('#check_client').val('old');
    //
    //     }else {
    //         $('#client_name').prop('disabled', false);
    //         $('#client_tele').prop('disabled', false);
    //         $('#client_adresse').prop('disabled', false);
    //         $('#check_client').val('new');
    //     }
    //
    // });
    // if($('#client').val()!='')$('#check_client').val('old');
    // else $('#check_client').val('new');
    //
    // $('.new-client-block').addClass('animated lightSpeedOut');
    // $('.new-client-block').css('display','none');
    //
    //
    //
    // $('#clickme2').css('display','none');
    //
    // $('#clickme2').click(function () {
    //
    //     $('#clickme2').css('display','none');
    //     $('#clickme').css('display','inherit');
    //     $('.new-client-block').toggleClass("lightSpeedIn lightSpeedOut");
    //
    //
    // });
    //
    // $('#clickme').click(function () {
    //
    //     $('#clickme2').css('display','inherit');
    //     $('#clickme').css('display','none');
    //
    //     $('#client').val('').trigger('change');
    //
    //     $('.new-client-block').css('display','inherit');
    //     $('.new-client-block').toggleClass("lightSpeedIn lightSpeedOut");
    //
    //     console.log($("#client").val());
    // });

});

