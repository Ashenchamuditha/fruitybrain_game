<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Score Board</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("pic4.jpg"); /* Replace with your image path */
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display:flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .scoreboard {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .scoreboard h1 {
            margin-bottom: 20px;
            font-size: 50px;
            color: #333;
        }

        .scoreboard table {
            width: 100%;
            border-collapse: collapse;
        }

        .scoreboard th, .scoreboard td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .scoreboard th {
            background-color: #f8f8f8;
            font-weight: bold;
        }

        .scoreboard tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="scoreboard">
        <h1>Score Board</h1>
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>user1</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>user2</td>
                    <td>90</td>
                </tr>
                <tr>
                    <td>user3</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>user4</td>
                    <td>40</td>
                </tr>
                <tr>
                    <td>user5</td>
                    <td>20</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>