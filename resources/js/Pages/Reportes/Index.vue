<script>
export default {
    name: 'SolicitudIndex'
}
</script>



<template>
    <AppLayout class="bg-gray-100">
        <template #header>
            <h1 class="font-bold">Reportes</h1>
        </template>
        <div class="bg-grey-800">
            <br>
            <button
                class="bg-green-500 hover:bg-green-300 text-white font-bold py-1 px-4 border-b-4 border-green-700 hover:border-green-500 rounded float-top"
                @click="openCreate">
                <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14m-7 7V5" />
                </svg>
            </button>

            <div class="form-group float-right rounded-full">
                <input type="search" placeholder="Buscar..."
                    class="form-input bg-gray-200 text-white-500 rounded-full px-10 py-1 float-right mr-8 bottom-2"
                    @input="filterSolicitudes($page.props.solicitudes)" v-model="filter">
                <button
                    class="bg-gray-500 hover:bg-gray-300 text-white font-bold py-2 px- border-b-4 border-gray-700 hover:border-gray-500 rounded-xl float-right ">
                    <svg class="w-[15px] h-[15px] text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                </button>
            </div>
            <div class="relative overflow-x-auto text-center">
                <div class="max-w-sm rounded overflow-hidden shadow-lg">
  <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains">
  <div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
    <p class="text-gray-700 text-base">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
    </p>
  </div>
  <div class="px-6 pt-4 pb-2">
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
  </div>
</div>
            </div>
        </div>
    </AppLayout>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';
const mostrar = ref(false);
const mostrarCrear = ref(false);
const sol = ref({});

const form = useForm({
    rut: '',
    name: '',
    aPaterno: '',
    aMaterno: '',
    email: '',
    sexo: '',
    telefono: '',
    estadoCivil: '',
    fechaNacimiento: '',
    nacionalidad: '',
    password: '',
    password_confirmation: '',
    profesion: ''

});

const filter = ref("");
function filterSolicitudes(solicitudes) {
    const sol = solicitudes.filter((solicitud) =>
        solicitud.usuario_creacion.name.includes(filter.value.toLowerCase()) ||
        solicitud.step.includes(filter.value.toLowerCase()) ||
        solicitud.id.toString().includes(filter.value)
    );
    console.log(sol);
}
//const usuarios = Inertia.props;

const mostrarModal = () => {
    mostrar.value = !mostrar.value;

}

const openCreate = () => {
    mostrarCrear.value = !mostrarCrear.value;
}
const crear = async (form) => {
    console.table(form);
    const formdata = new FormData();
    formdata.append('id', usuario.id);
    formdata.append('telefono', usuario.telefono);
    formdata.append('aMaterno', usuario.aMaterno);
    formdata.append('aPaterno', usuario.aPaterno);
    formdata.append('name', usuario.name);
    formdata.append('nacionalidad', usuario.nacionalidad);
    formdata.append('profesion', usuario.profesion);

    //const res = await axios.post('/api/update-solicitud', (formdata));
}
const guardar = async (solicitud) => {
    const formdata = new FormData();
    formdata.append('id', usuario.id);
    formdata.append('telefono', usuario.telefono);
    formdata.append('aMaterno', usuario.aMaterno);
    formdata.append('aPaterno', usuario.aPaterno);
    formdata.append('name', usuario.name);
    formdata.append('nacionalidad', usuario.nacionalidad);
    formdata.append('profesion', usuario.profesion);
    const res = await axios.post('/api/update-solicitud', (formdata));
    console.log(res);
}
const editar = (solicitud) => {
    mostrarModal()
    sol.value = solicitud;
    console.table(sol.value);
}
</script>