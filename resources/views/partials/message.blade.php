@php
    if (Session::get('success')) {
        $successMessage = Session::get('success');
    } else {
        $successMessage = null;
    }
@endphp
<div class="modal" id="button-modal-preview">
    <div class="modal__content relative"> <a data-dismiss="modal" href="javascript:;"
            class="absolute right-0 top-0 mt-3 mr-3"> <i data-feather="x" class="w-8 h-8 text-gray-500"></i> </a>
        <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
            <div class="text-3xl mt-5">Modal Example</div>
            <div class="text-gray-600 mt-2">{{ $successMessage }}</div>
        </div>
        <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                class="button w-24 bg-theme-1 text-white">Ok</button> </div>
    </div>
</div>

@if ($successMessage)
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Swal.fire(
            'Success!',
            '{{ $successMessage }}',
            'success'
        )
    </script>
@endif
