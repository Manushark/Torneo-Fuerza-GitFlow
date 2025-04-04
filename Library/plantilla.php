<?php   

class plantilla{

    static $instancia = null;

    public static function aplicar(){
        if(self::$instancia == null){
            self::$instancia = new plantilla();
        }
    }

    public function __construct(){
        ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Torneo de la fuerza💪🏼⚡</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                        background-color: #f4f4f4;
                        color: #333;
                    }

                    h1 {
                        text-align: center;
                        color: #2C3E50;
                    }

                    p {
                        text-align: center;
                        font-size: 18px;
                        color: #7F8C8D;
                    }

                    .container {
                        padding: 20px;
                        text-align: center;
                        background-color: #ecf0f1;
                        border-radius: 50px;
                        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                        max-width: 5200px;
                        margin: 20px auto;
                    }

                    a {
                        text-decoration: none;
                        color: #2980B9;
                        font-weight: bold;
                        margin: 10px;
                    }

                    a:hover {
                        color: #1ABC9C;
                    }

                    .right {
                        text-align: right;
                        margin: 20px;
                    }

                    .right a {
                        padding: 10px 20px;
                        background-color: #2980B9;
                        color: white;
                        border-radius: 5px;
                        transition: background-color 0.3s;
                    }

                    .right a:hover {
                        background-color: #3498DB;
                    }

                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 20px;
                    }

                    th, td {
                        padding: 12px;
                        text-align: center;
                        border: 1px solid #BDC3C7;
                    }

                    th {
                        background-color: #2980B9;
                        color: white;
                    }

                    td img {
                        border-radius: 50%;
                    }

                    td a {
                        color: #2980B9;
                        text-decoration: none;
                    }

                    td a:hover {
                        text-decoration: underline;
                    }
                    label, input {
                        font-size: 18px;
                    }
                    button {
                        padding: 10px 20px;
                        background-color: #2980B9;
                        color: white;
                        border: none;
                        border-radius: 5px;
                        cursor: pointer;
                        transition: background-color 0.3s;
                    }
                </style>
            </head>
            <body>
                <div class="container">
        <?php
    }

    public function __destruct(){
        ?>
        <hr>
        <p>Dev by lito⚡</p>
                </div>
            </body>
        </html>
        <?php
    }
}
?>
