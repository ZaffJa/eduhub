<form action="{{ action('ExcelController@store') }}" method="post" enctype="multipart/form-data">

    <h3><strong>README</strong></h3>
    {{ csrf_field() }}
    <ol>
        <li>Before you submit 'GO' make sure you have <b>MIGRATE</b> all migration files.</li>
        <li>After that make sure <i>schools</i> table and <i>school_locations</i> table are <b>EMPTY</b></li>
        <li>When you click 'GO' the screen will load for a <b>LONG TIME.</b> Dont worry about this as the backend is inserting 2397 schools data inside database.</li>
        <li>Once complete, the screen will display 'ok'.</li>
        <li>That's it.</li>
    </ol>
    <input type="submit" value="GO">
</form>
