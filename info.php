<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1rem;
        }

        tr, td {
            padding: 1rem .5rem;
            border: 1px solid #ccc;
        }

        thead {
            background-color: #333;
            color: #fff;
        }

        button {
            padding: 1rem 1.5rem;
            background-color: #005AAA;
            color: #fff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
        }
        
        table {
            margin-top: 1rem;
            text-align: center;
        }
    </style>
</head>
<body>
    

    <button type="button" onclick="loadDoc()">Change content</button>

    <table width="100%">
        <thead>
            <tr>
                <td>row_id</td>
                <td>username</td>
                <td>password</td>
                <td>email</td>
            </tr>
        </thead>
        <tbody id="info"></tbody>
    </table>

    <script>
        function loadDoc() {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let data = JSON.parse(this.responseText);

                    for (let i = 0; i < data.length; i++) {
                        document.getElementById('info').innerHTML += `
                            <tr>
                                <td>${data[i].row_id}</td>
                                <td>${data[i].username}</td>
                                <td>${data[i].password}</td>
                                <td>${data[i].email}</td>
                            </tr>
                        `;
                    }
                }
            }
            document.getElementById('info').innerHTML = "";
            xhttp.open('GET', 'index.php', true);
            xhttp.send();
        }
    </script>


</body>
</html>