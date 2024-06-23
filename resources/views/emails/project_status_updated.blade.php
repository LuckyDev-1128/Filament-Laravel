<!DOCTYPE html>
<html>

<head>
    <title>Project {{ $projectData['title'] }} is {{ $statusName }} Now!</title>
</head>

<body>
    <h2>{{ $userName }}: has done the project and it is ready for Review!</h2>
    <p>Title: {{ $projectData['title'] }}</p>
    <p>Description: {{ $projectData['description'] }}</p>
    <p>Username: {{ $userName }}</p>
    <p>Status: {{ $statusName }}</p>
</body>

</html>
