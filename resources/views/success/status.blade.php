@if (session('status'))
    <script>
        $.notify({
            message: "<strong>{{ session('status') }}</strong>"
        }, {
            type: 'warning'
        });
    </script>
@endif
