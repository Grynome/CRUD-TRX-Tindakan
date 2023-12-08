<!-- partial:../../partials/_footer.html -->
<footer
    class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
    <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>.</p>
    <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
</footer>
<!-- partial -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.10/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- core:js -->
<script src="{{ asset('assets') }}//vendors/core/core.js"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{ asset('assets') }}//vendors/datatables.net/jquery.dataTables.js"></script>
<script src="{{ asset('assets') }}//vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
<script src="{{ asset('assets') }}/vendors/inputmask/jquery.inputmask.min.js"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{ asset('assets') }}//vendors/feather-icons/feather.min.js"></script>
<script src="{{ asset('assets') }}//js/template.js"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{ asset('assets') }}/js/flatpickr.js"></script>
<script src="{{ asset('assets') }}/js/sweet-alert.js"></script>
<script src="{{ asset('assets') }}/js/inputmask.js"></script>
<script src="{{ asset('assets') }}/js/data-table.js"></script>
<!-- End custom js for this page -->
<script src="{{ asset('assets') }}/js/myscript.js"></script>

<script>
    $(document).ready(function() {
        $('table#display').DataTable({
            "aLengthMenu": [
                [10, 30, 50, -1],
                [10, 30, 50, "All"]
            ],
            "iDisplayLength": 10,
            "language": {
                search: ""
            },
        });
    });
</script>
<script>
    $('.remove-prj').on('click', function() {
        Swal.fire({
            title: "Are u Sure to delete this Item?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Save'
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {

                jQuery('#remove-prj').submit();
            }
        });
        return false;
    });
</script>
</body>

</html>
