<template>
    <Head title="Default Form" />
    <AuthenticatedLayout>
        <form @submit.prevent="submitForm">

            <p>
                <label for="email">Email</label>
                <input id="name" v-model="email" type="text" name="name">
            </p>
            <p>
                <label for="clave">Clave</label>
                <input id="clave" v-model="clave" type="text" name="clave">
            </p>
            <p>
                <label for="confirmarClave">Confirmar Clave</label>
                <input id="confirmarClave" v-model="confirmarClave" type="text" name="confirmarClave">
            </p>
            <p>
                <label for="name">Primer Nombre</label>
                <input id="name" v-model="name" type="text" name="name">
            </p>
            <p>
                <label for="lastName">Apellido</label>
                <input id="lastName" v-model="lastName" type="text" name="lastName">
            </p>
            <p>
                <label for="company">Empresa (Opcional)</label>
                <input id="company" v-model="company" type="text" name="company">
            </p>
            <p>
                <label for="phone">Teléfono</label>
                <input id="phone" v-model="phone" type="text" name="phone">
            </p>
            <label for="name">Pregunta de Seguridad</label>
            <select v-model="securityQuestion">
                <option disabled value="">¿Cuál es el apellido de su mejor amigo del colegio?</option>
                <option>Pepito</option>
                <option>Juanito</option>
                <option>Pablito</option>
                <option>Pedrito</option>
            </select>

            <button type="submit">Enviar</button>
        </form>
    </AuthenticatedLayout>
</template>
  
<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
export default {
    data() {
        return {
            securityQuestion: 'Pablito',
            // Otros datos del formulario
        };
    },
    methods: {
        submitForm() {
            // Lógica para enviar los datos del formulario
        }
    }
}
</script>
  