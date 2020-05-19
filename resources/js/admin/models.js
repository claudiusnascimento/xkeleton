
import { exists } from './../common/Helpers'

// INDEX
let dataTable = '.data-table';

if(exists(dataTable)) {

    $('.data-table').DataTable({
        columnDefs: [
            { targets: 'no-sort', orderable: false }
        ],
        order: [[0, 'desc']]
    });

}



// DELETAR
let verified = 'verified';

let formDestroy = '.form-destroy';

if(exists(formDestroy)) {

    $(formDestroy).on('submit', function(e) {

        let form = $(this);
        let attr = form.attr(verified);

        if(typeof attr == 'undefined' || attr == '') {

            e.preventDefault();

            bootbox.confirm({
                message: "Tem certeza que quer deletar?",
                buttons: {
                    confirm: {
                        label: 'Sim',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'Não',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {

                    if(result) {
                        form.attr('verified', '1')
                        form.submit();
                    }
                }
            });

        }

    });
}
