<form action="{{ action('ExcelController@store') }}" method="post" enctype="multipart/form-data">

    {{ !empty(getenv('mail')) ? getenv('mail') : 'lee' }}
    <input type="file" name="excel">
    {{ csrf_field() }}
    <input type="submit">
</form>
