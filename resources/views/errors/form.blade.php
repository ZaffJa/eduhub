@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <script>
            $.notify({
                message: "<strong>{{ $error }}</strong>"
            }, {
                type: 'danger'
            });
        </script>
    @endforeach
@endif