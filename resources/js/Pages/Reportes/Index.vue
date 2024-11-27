<template>
    <AppLayout class="bg-gray-100">
      <template #header>
        <h1 class="font-bold text-black-300">Reportes</h1>
      </template>
  
      <!-- Contenedor principal -->
      <div class="bg-grey-800 p-6">
        <!-- Cards de Reportes -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <div
            v-for="(reporte, index) in reportes"
            :key="index"
            class="bg-gray-700 rounded-lg shadow-md p-4 text-center hover:bg-green-500 cursor-pointer"
            @click="seleccionarReporte(reporte)"
          >
            <h2 class="text-lg font-semibold text-yellow-300 mb-2">{{ reporte.nombre }}</h2>
            <p class="text-sm text-gray-300">{{ reporte.descripcion }}</p>
          </div>
        </div>
  
        <!-- Vista previa del reporte -->
        <div v-if="reporteSeleccionado" class="mt-8 bg-gray-300 p-6 rounded-lg opacity-80">
          <h2 class="text-white-300 text-xl font-bold mb-4">Vista Previa: {{ reporteSeleccionado.nombre }}</h2>
  
          <!-- Tabla de datos del reporte -->
          <table class="table-auto w-full bg-gray-300 rounded-lg">
            <thead class="bg-gray-700">
              <tr>
                <th v-for="header in headers" :key="header" class="p-2 text-left text-yellow-300">
                  {{ header }}
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(row, index) in reporteDatos" :key="index" class="">
                <td v-for="value in row" :key="value" class="p-2 text-black-300">
                  {{ value }}
                </td>
              </tr>
            </tbody>
          </table>
  
          <!-- Botón de descarga -->
          <div class="text-right mt-4">
            <button
              @click="descargarReporte"
              class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"
            >
              Descargar Reporte
            </button>
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
  import axios from 'axios';
  
  // Variables existentes
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
    profesion: '',
  });
  const filter = ref('');
  function filterSolicitudes(solicitudes) {
    const sol = solicitudes.filter((solicitud) =>
      solicitud.usuario_creacion.name.includes(filter.value.toLowerCase()) ||
      solicitud.step.includes(filter.value.toLowerCase()) ||
      solicitud.id.toString().includes(filter.value)
    );
    console.log(sol);
  }
  const mostrarModal = () => {
    mostrar.value = !mostrar.value;
  };
  const openCreate = () => {
    mostrarCrear.value = !mostrarCrear.value;
  };
  
  // Nueva funcionalidad para reportes
  const reportes = ref([
    { nombre: 'Aprobados/Rechazados', descripcion: 'Reporte de trámites aprobados y rechazados' },
    { nombre: 'Licencias Emitidas', descripcion: 'Reporte de licencias emitidas' },
    { nombre: 'Solicitudes', descripcion: 'Reporte de solicitudes registradas' },
    { nombre: 'Pagos', descripcion: 'Reporte de pagos realizados' },
    { nombre: 'Reporte Otro 1', descripcion: 'Descripción del reporte personalizado' },
    { nombre: 'Reporte Otro 2', descripcion: 'Descripción del reporte personalizado' },
  ]);
  
  const reporteSeleccionado = ref(null);
  const headers = ref([]);
  const reporteDatos = ref([]);
  
  const seleccionarReporte = async (reporte) => {
    reporteSeleccionado.value = reporte;
  
    try {
      const response = []//await axios.post('/api/reportes', { tipo: reporte.nombre });
      headers.value = response.headers || ['id','Usuario','Estado'];
      reporteDatos.value = response.datos || [['1','Diego','Aprobado']];
    } catch (error) {
      console.error('Error al cargar el reporte:', error);
      alert('No se pudieron cargar los datos del reporte.');
    }
  };
  
  const descargarReporte = async () => {
    try {
      const response = await axios.post(
        '/api/reportes/descargar',
        { tipo: reporteSeleccionado.value.nombre },
        {
          responseType: 'blob',
        }
      );
  
      const url = window.URL.createObjectURL(new Blob([response.data]));
      const link = document.createElement('a');
      link.href = url;
      link.setAttribute('download', `${reporteSeleccionado.value.nombre}.xlsx`);
      document.body.appendChild(link);
      link.click();
    } catch (error) {
      console.error('Error al descargar el reporte:', error);
      alert('No se pudo descargar el reporte.');
    }
  };
  </script>
  
  <style>
  .card {
    transition: transform 0.2s ease-in-out;
  }
  .card:hover {
    transform: scale(1.05);
  }
  </style>
  