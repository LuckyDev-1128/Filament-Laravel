<!DOCTYPE html>
<html>

<head>
    <title>Project Assigned Notification</title>
</head>

<body>
    <h2>Project Assigned</h2>
    <p>Title: {{ $projectData['title'] }}</p>
    <p>Description: {{ $projectData['description'] }}</p>
    <p>Assigned By: {{ $assigned_by }}</p>
    <p>Status: {{ $statusName }}</p>
</body>

</html>
