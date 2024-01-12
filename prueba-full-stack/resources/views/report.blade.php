<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF Report</title>
</head>

<body>
    <table style="border: 1px solid black;">
        <tr style="border: 1px solid black;">
            <th style="border: 1px solid black;">Dato</th>
            <th style="border: 1px solid black;">Valor</th>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black;">Email</td>
            <td style="border: 1px solid black;">{{$email}}</td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black;">Clave</td>
            <td style="border: 1px solid black;">{{$password}}</td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black;">Confirmar Clave</td>
            <td style="border: 1px solid black;">{{$confirmation_password}}</td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black;">Primer Nombre</td>
            <td style="border: 1px solid black;">{{$first_name}}</td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black;">Apellido</td>
            <td style="border: 1px solid black;">{{$last_name}}</td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black;">Empresa (Opcional)</td>
            <td style="border: 1px solid black;">{{$company}}</td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black;">Teléfono</td>
            <td style="border: 1px solid black;">{{$phone_number}}</td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black;">Pregunta de Seguridad</td>
            <td style="border: 1px solid black;">{{$security_question}}</td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black;">Invoice Code</td>
            <td style="border: 1px solid black;">{{substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8)}}</td>
        </tr>
        <tr style="border: 1px solid black;">
            <td style="border: 1px solid black;">Total Amount (USD)</td>
            <td style="border: 1px solid black;">$ {{rand(10,100)}}.00</td>
        </tr>
    </table>
</body>

</html>