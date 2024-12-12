<template>
    <AppLayout>
      <div class="min-h-screen bg-gray-800 text-white">
        <!-- Encabezado -->
        <header class="bg-gray-900 py-4 px-8 flex justify-between items-center">
          <div class="text-xl font-bold text-yellow-300">Proceso Finalizado</div>
        </header>
        <!-- Contenedor principal -->
        <main class="max-w-5xl mx-auto py-6 bg-gray-700 p-6 rounded-lg">
          <!-- Mensaje principal -->
          <div class="text-center space-y-4">
            <h2 class="text-2xl font-semibold text-green-400">¡Hora Agendada con Éxito!</h2>
            <p class="text-lg">
              Tu hora seleccionada ha sido registrada con éxito y está en espera de confirmación y validación por parte de la
              <span class="text-yellow-300">Municipalidad de La Florida</span>.
            </p>
            <p class="text-lg">
              Recibirás un correo electrónico con la confirmación o el rechazo de tu hora, junto con el motivo correspondiente, a la dirección proporcionada.
            </p>
            <p class="text-sm text-gray-400">Gracias por utilizar nuestro servicio.</p>
          </div>
  
          <!-- Información adicional -->
          <div class="bg-gray-800 p-4 rounded-lg shadow-md mt-6 text-center">
            <h3 class="text-yellow-300 mb-2">Detalles de tu Hora Agendada:</h3>
            <p><strong>Fecha:</strong> {{ page.props.solicitud.fecha_agendada }}</p>
            <p><strong>Hora:</strong> {{ page.props.solicitud.hora_agendada }}</p>
          </div>
  
          <!-- Botón de finalizar -->
          <div class="text-center mt-6">
            <button @click="handleFinish" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
              Finalizar
            </button>
          </div>
        </main>
      </div>
    </AppLayout>
  </template>
  
  <script setup>
  import AppLayout from '@/Layouts/AppLayout.vue';
import { usePage } from '@inertiajs/vue3';
  import { ref, onMounted} from 'vue';
  const page = usePage();
  // Datos simulados de la hora seleccionada (esto puede venir de Inertia o Vuex)
  const fechaSeleccionada = ref('2024-12-15');
  const horaSeleccionada = ref('10:15 AM');
  
  // Acción al hacer clic en "Finalizar"
  const handleFinish = () => {
    alert('Gracias por tu solicitud. Puedes cerrar esta ventana.');
    // Redirigir al inicio o mostrar alguna otra pantalla
    // window.location.href = '/inicio';
  };
  onMounted( async()=>{
    const id = localStorage.getItem('id_solicitud');
   const step = await axios.post('/api/edit-solicitud',{id:id,step:'Proceso Finalizado'});
    if(step.data.res){
      page.props.solicitud=step.data.solicitud;
      console.log(step.data.solicitud);
    }
})
  </script>
  
  <style>
  /* Opcional: Ajustes de estilo para consistencia */
  h2 {
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
  }
  </style>
  