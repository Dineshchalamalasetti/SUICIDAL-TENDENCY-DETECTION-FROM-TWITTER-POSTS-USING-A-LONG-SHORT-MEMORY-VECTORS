<!DOCTYPE html>
<html>
<head>
    <title>Text Classification</title>
</head>
<body>
    <h1>Text Classification</h1>
    <form method="POST" action="">
        <label for="text">Enter Text:</label><br>
        <textarea id="text" name="text" rows="15" cols="70"></textarea><br>
        <input type="submit" value="Classify">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle POST requests here
        // You can use $_POST to access form data or the request body
        $text = $_POST['text'];

        // Call Python script and capture the output
        $output = shell_exec('python predict.py "' . $text . '"');
        
        // Display the output
        echo '<h2>Classification Result:</h2>';
        echo '<pre>' . $output . '</pre>';
    }
    ?>
</body>
</html>
