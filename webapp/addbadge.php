<!DOCTYPE html>
<html>
<head>
    <title>Add Badge</title>
    <link href="style.css" rel="stylesheet"/>
</head>
<body>
    <h2>Add New Badge</h2>
    <form method="post" action="process_addbadge.php">
        <label for="badge_name">Badge Name:</label><br>
        <input type="text" id="badge_name" name="badge_name" required><br><br>

        <label for="badge_desc">Badge Description:</label><br>
        <textarea id="badge_desc" name="badge_desc" rows="4" cols="50" required></textarea><br><br>

        <label for="badge_criteria">Badge Criteria:</label><br>
        <textarea id="badge_criteria" name="badge_criteria" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Add Badge">
    </form>
</body>
</html>