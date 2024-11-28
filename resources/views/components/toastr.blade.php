<script>
    toastr.options = {
        "progressBar": {{ $progressBar ?? "true" }},
        "timeOut": {{ $timeOut ?? "3000" }},
        "closeButton": {{ $closeButton ?? "false" }},
        "positionClass": "{{ $positionClass ?? 'toast-top-right' }}"
    }
</script>
@if (session('toastr_success'))
    <script>
        toastr.success('{{ session('toastr_success') }}');
    </script>
@endif
@if (session('toastr_info'))
    <script>
        toastr.info('{{ session('toastr_info') }}');
    </script>
@endif
@if (session('toastr_warning'))
    <script>
        toastr.warning('{{ session('toastr_warning') }}');
    </script>
@endif
@if (session('toastr_error'))
    <script>
        toastr.error('{{ session('toastr_error') }}');
    </script>
@endif
