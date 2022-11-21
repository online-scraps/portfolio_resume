function sidebarAddActive() {
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $('ul li a').each(function () {
        if (this.href === path) {
            $(this).addClass('side-menu--active');
        }
    });
}

function convertDataTable(tableId) {
    var t = $(tableId).DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf'
        ],
        columnDefs: [{
            searchable: false,
            orderable: false,
            targets: 0,
        },],
        order: [
            [1, 'asc']
        ],
    });

    t.on('order.dt search.dt', function () {
        let i = 1;
        t.cells(null, 0, {
            search: 'applied',
            order: 'applied'
        }).every(function (cell) {
            this.data(i++);
        });
    }).draw();
}

function deleteRecord(formId) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-1 text-white',
            cancelButton: 'button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-6 text-white'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'error',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // debugger;
            // document.getElementById(formId).submit();
            $(formId).submit();
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your File is safe',
                'success'
            )
        }
    })
}
