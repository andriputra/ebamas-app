<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts</title>
</head>
<body>
    <h1>Accounts</h1>
    <form action="/accounts" method="post">
        @csrf
        <label for="name">Account Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="balance">Balance:</label><br>
        <input type="text" id="balance" name="balance"><br><br>
        <button type="submit">Add Account</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
            <tr>
                <td>{{ $account->name }}</td>
                <td>{{ $account->balance }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
