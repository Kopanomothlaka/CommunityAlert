<!DOCTYPE html>
<html>
<head>
    <title>Send Alert</title>
</head>
<body>
<h1>Send Alert to Community</h1>
<form action="{{ route('alerts.store') }}" method="POST">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required>
    <br>
    <label for="message">Message:</label>
    <textarea name="message" id="message" required></textarea>
    <br>
    <button type="submit">Send Alert</button>
</form>
</body>
</html>
