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



$(document).ready(function() {
            //=========================================
            //  Water Effect
            //=========================================
            $('.banner_water_effect').ripples({
                resolution: 256,
                dropRadius: 20,
                perturbance: 0.03,
                interactive: true,
            });
            //  Smoothscroll js
            //=========================================
            $(".pageRedirectClass").on('click', function(event) {
                // debugger;
                if (this.hash !== "") {
                    event.preventDefault();
                    var hash = this.hash;
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 1000, function() {

                        window.location.hash = hash;
                    });
                }
            });
        });

        function runCommand(command, btnText, title) {
            Swal.fire({
                title: title,
                showCancelButton: true,
                confirmButtonText: btnText,
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return $.ajax({
                        method: "POST",
                        url: '/maintainance/execute-command',
                        data: {
                            _token: '{{ csrf_token() }}',
                            command: command
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                return response.message;
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            Swal.fire(
                                'Oops!',
                                'Error occurred. Try again',
                                'error'
                            );
                        }
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(`${result.value.message}`);
                }
            })
        }

        function runCommandViaInput() {
            Swal.fire({
                title: 'Run Artisan Command',
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Execute Command',
                showLoaderOnConfirm: true,
                preConfirm: (command) => {
                    return $.ajax({
                        method: "POST",
                        url: '/maintainance/execute-command',
                        data: {
                            _token: '{{ csrf_token() }}',
                            command: command
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                return response.message;
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            Swal.fire(
                                'Oops!',
                                'Error occurred. Try again',
                                'error'
                            );
                        }
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(`${result.value.message}`);
                }
            })
        }



        $('.color-panel').each(function() {
            $('.maintainer-setting').on('click', function() {
                runCommandViaSelect();
                // $('.color-panel').toggleClass('open');
            });
        });
