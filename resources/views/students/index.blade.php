<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Notes</title>
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Header styles */
        h1 {
            text-align: center;
            margin-top: 20px;
            font-size: 2rem;
            color: #4CAF50;
        }

        /* Form styles */
        form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
            gap: 10px;
        }

        input[type="file"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fff;
            cursor: pointer;
            font-size: 1rem;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Table styles */
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 1rem;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #555;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            table {
                width: 100%;
            }

            th, td {
                font-size: 0.9rem;
                padding: 8px;
            }

            button {
                font-size: 0.9rem;
                padding: 8px 15px;
            }
        }
    </style>
</head>
<body>
    <h1>Student Notes</h1>
    <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit">Import</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>C1</th>
                <th>C2</th>
                <th>Moyenne</th>
                <th>EFM</th>
                <th>General Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->c1 }}</td>
                <td>{{ $student->c2 }}</td>
                <td>{{ $student->moyenne }}</td>
                <td>{{ $student->efm }}</td>
                <td>{{ $student->general_note }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
