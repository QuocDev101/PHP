<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        table {
            width: 100%;
            max-width: 800px;
            margin-top: 20px;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        thead tr {
            background-color: #3498db;
            color: #fff;
            text-align: left;
            font-weight: bold;
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #e0eaff;
        }

        a.button, button {
            text-decoration: none;
            color: #fff;
            padding: 8px 12px;
            border-radius: 5px;
            margin: 0 4px;
            display: inline-block;
            font-size: 14px;
        }

        a.button-add {
            background-color: #27ae60;
        }

        a.button-edit {
            background-color: #3498db;
        }

        button.button-delete {
            background-color: #e74c3c;
            border: none;
            cursor: pointer;
        }

        a.button-add:hover {
            background-color: #1e8449;
        }

        a.button-edit:hover {
            background-color: #2c6aa6;
        }

        button.button-delete:hover {
            background-color: #c0392b;
        }

        .add-user {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <h1>Danh sách Người Dùng</h1>

    <div class="add-user">
        <a href="{{ route('users.create') }}" class="button button-add">Thêm Người Dùng</a>
    </div>
        <br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="button button-edit">Sửa</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button button-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
