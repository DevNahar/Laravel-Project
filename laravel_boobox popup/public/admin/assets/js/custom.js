$(document).on("click", ".open-modal", function(e) {
    e.preventDefault();
    let selectUrl = $(this).attr('href')
    let modalType = $(this).attr('modalType')
    let divId = $(this).attr('selector')
    let modalTitle = $(this).attr('modal-title')
//         $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });
   $.ajax({
        url: selectUrl,
        type: "GET",
        datatype: "html",
        success: function(response){
            // console.log(response);
            // $('#abc').html(response);

            bootbox.dialog({
                title: modalTitle,
                message: `<div id="${divId}"></div>`,
                size: 'large',
                buttons: {
                    cancel: {
                        label: "Close",
                        className: 'btn-default',
                        callback: function(){
                            console.log('Custom cancel clicked');
                        }
                    },

                    ok: {
                        label: "modalType",
                        className: 'btn-info',
                        callback: function(){
                            // console.log('Custom OK clicked');
                            $('#'+ divId +'form').submit();
                        }
                    }
                }
            });

            $('#'+divId).html(response)
        }
   });

});
