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
            </form>
            @if(count($rows) > 0)
            <table class="table table-bordered mt-3">
                <tr>
                    <th colspan="3">
                        List Of Users
                    </th>
                </tr>
                <tr>
                    <th>KEY</th>
                    <th>VALUE</th>

                </tr>
                @foreach($rows as $key => $value)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $value }}</td>

                    </tr>
                @endforeach
            </table>
            @endif

        </div>
    </div>
</div>

</body>
</html>
