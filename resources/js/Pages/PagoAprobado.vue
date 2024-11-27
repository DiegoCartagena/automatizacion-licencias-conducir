<template>

      <div class="min-h-screen bg-gray-800 text-white">
        <!-- Encabezado -->
        <header class="bg-gray-900 py-4 px-8 flex justify-between items-center">
          <div class="text-xl font-bold text-yellow-300">Estado del Pago</div>
        </header>
  
        <!-- Contenedor principal -->
        <main class="max-w-5xl mx-auto py-6 bg-gray-700 p-6 rounded-lg">
          <h2 class="text-lg font-semibold mb-4">Detalles del Pago</h2>
            <!-- Imagen de check para pagos aprobados -->
        <div v-if="estadoPago === 2" class="flex justify-center mb-6">
          <img src="/images/check-green.png" alt="Pago Aprobado" class="w-[200px] h-[200px] rounded-full" />
        </div>
        <div v-if="estadoPago === 3" class="flex justify-center mb-6">
          <img src="/images/cros-red.png" alt="Pago Rechazado" class="w-[200px] h-[200px] rounded-full" />
        </div>

          <!-- Información del pago -->
          <div class="bg-gray-800 p-4 rounded-lg shadow-md">
            <p class="mb-2">
              <strong>Estado del Pago:</strong> 
              <span :class="estadoPago === 2 ? 'text-green-500' : 'text-red-500'">
                {{ estadoPago === 2 ? 'Aprobado' : 'Rechazado' }}
              </span>
            </p>
            <p class="mb-2"><strong>ID del Pago:</strong> {{ pago.id }}</p>
            <p class="mb-2"><strong>Monto:</strong> $ {{ pago.total }}</p>
            <p class="mb-2"><strong>Fecha:</strong> {{ pago.created_at }}</p>
            <p v-if="estadoPago === 3" class="mb-2 text-red-500">
              <strong>Razón del Rechazo:</strong> {{ pago.motivo }}
            </p>
          </div>
  
          <!-- Botón para pasar a la siguiente pantalla -->
          <div class="text-center mt-6">
            <button @click="handleNext" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
              Continuar
            </button>
          </div>
        </main>
      </div>

  </template>
  
  <script setup>
  import AppLayout from '@/Layouts/AppLayout.vue';
  import { ref, computed, onMounted} from 'vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
  
  // Obtener los datos del pago desde Inertias
  const { props } = usePage();
  const pago = props.pago || { id: 0, monto: 0, fecha: '', estado: '', razon: '' };
  const estadoPago = pago.status;
  
  // Acción al hacer clic en "Continuar"
  const handleNext = () => {
    if (estadoPago === 2) {
      alert('Redirigiendo al siguiente paso del proceso...');
      // Redirige al siguiente paso según tu flujo
      window.location.href = ('/finalizado');
    } else {
      alert('Redirigiendo al inicio del proceso...');
      // Redirige al inicio o una pantalla específica
      // Inertia.visit('/ruta-inicio');
    }
  };
  onMounted( async()=>{
    const id = localStorage.getItem('id_solicitud');
    if(estadoPago==2){
        const step = await axios.post('/api/edit-solicitud',{id:id,step:'Pago Aprobado'});
    }else{
        const step = await axios.post('/api/edit-solicitud',{id:id,step:'Pago Rechazado'});
    }
    if(step.data.res){
      console.log(step.data.solicitud);
    }
});
  </script>
  
  <style>
  /* Opcional: Mejora del estilo */
  div {
    max-width: 100%;
  }
  </style>
  