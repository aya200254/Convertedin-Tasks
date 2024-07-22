<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2 {
            font-size: 2rem;
            color: #343a40;
            margin-bottom: 20px;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }
        thead th {
            background-color: #007bff;
            color: #ffffff;
        }
        .pagination {
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">
            <a href="{{ route('statistics') }}" class="link-style">
                Task List 
            </a>
        </h2>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Assigned To</th>
                    <th>Assigned By</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            @if ($task->assignedTo)
                                {{ $task->assignedTo->name }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if ($task->assignedBy)
                                {{ $task->assignedBy->name }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('statistics') }}" class="link-style">
           (Click Here To Show Top 10 Users With Highest Tasks Count)
        </a>
        <div class="d-flex justify-content-center">
            {{ $tasks->links() }}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
