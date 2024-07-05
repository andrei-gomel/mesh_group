<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Import Excel File to Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="card mt-3 mb-3">
        <div class="card-header text-center">
            <h4>Laravel 10 Import Excel File to Database<br>
                @if($totalSave AND count($rows) > 0) Обработано {{ $totalSave }} строк @endif
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-primary">Import User Data</button>
                <br>
                <a href="/">Вывести данные из БД</a>
                <a href="{{ route('format_data') }}">Отформатированнные данные</a>
            </form>
            @if(count($rows) > 0)
                <table class="table table-bordered mt-3">
                    <tr>
                        <th colspan="3">
                            List Of Users
                        <!--<a class="btn btn-danger float-end" href="{{ route('import') }}">Export User Data</a>-->
                        </th>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date</th>
                    </tr>
                    @foreach($rows as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->date }}</td>
                        </tr>
                    @endforeach
                </table>
            @endif

        </div>
    </div>
</div>

</body>
</html>

