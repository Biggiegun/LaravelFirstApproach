<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Default Form</title>

    <style>
        /* Estilo para el formulario */
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        /* Estilo para los campos de entrada */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        /* Estilo para el botón de enviar */
        .submit-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<form @submit.prevent="submitForm" class="form-container" action="{{ route('report') }}" method="POST">
    @csrf
    <p>
        <label class="form-group" for="email">Email</label>
        <input class="form-group" id="email" v-model="email" type="text" name="email">
    </p>
    <p>
        <label class="form-group" for="clave">Clave</label>
        <input class="form-group" id="clave" v-model="clave" type="password" name="clave">
    </p>
    <p>
        <label class="form-group" for="confirmarClave">Confirmar Clave</label>
        <input class="form-group" id="confirmarClave" v-model="confirmarClave" type="password" name="confirmarClave">
    </p>
    <p>
        <label class="form-group" for="name">Primer Nombre</label>
        <input class="form-group" id="name" v-model="name" type="text" name="name">
    </p>
    <p>
        <label class="form-group" for="lastName">Apellido</label>
        <input class="form-group" id="lastName" v-model="lastName" type="text" name="lastName">
    </p>
    <p>
        <label class="form-group" for="company">Empresa (Opcional)</label>
        <input class="form-group" id="company" v-model="company" type="text" name="company">
    </p>
    <p>
        <label class="form-group" for="phone">Teléfono</label>
        <input class="form-group" id="phone" v-model="phone" type="text" name="phone">
    </p>
    <label class="form-group" for="name">Pregunta de Seguridad</label>
    <select class="form-group" v-model="securityQuestion" name="securityQuestion">
        <option value="0" disabled value="" selected>¿Cuál es el apellido de su mejor amigo del colegio?</option>
        <option value="Pepito">Pepito</option>
        <option value="Juanito">Juanito</option>
        <option value="Pablito">Pablito</option>
        <option value="Pedrito">Pedrito</option>
    </select>

    <button type="submit" class="submit-button">Generar PDF</button>

</form>

</html>