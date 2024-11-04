<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this user?');
        }
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #272727; /* Dark background */
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column; /* Center content vertically */
            height: 100vh;
            color: #e0e0e0; /* Lighter text color for better contrast */
        }

        h1, h3 {
            color: #ffffff; /* White color for headers */
        }

        p {
            color: #d0d0d0; /* Light gray for paragraph text */
        }

        table th {
            color: #ffffff; /* White color for table headers */
        }

        table td {
            color: #e0e0e0; /* Light gray color for table data */
        }

        .btn-danger {
            margin-left: auto; /* Align logout button to the right */
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Dashboard</h1>
        <p class="text-left mt-3">Hello, {{ Auth::user()->name }}! You are logged in!</p>
        <div class="text-right mb-3">
            <form action="/logout" method="post" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        <h3 class="mt-4">Registered Users</h3>
        <table class="table table-light-gray table-striped rounded mt-3" style="background-color: #4d4d4d; color: #212529;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('users.edit', $user->id) }}">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirmDelete();">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
