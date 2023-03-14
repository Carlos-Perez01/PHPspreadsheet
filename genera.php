<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="reporte.php" method="POST">
        <label>Status: </label>
        <select id="status" name="status">
            <option value="complete" >Completed</option>
            <option value="failed" >Failed</option>
        </select>

        <br /><br />

        <button type="submit">Generar Reporte</button>
    </form>
</body>
</html>