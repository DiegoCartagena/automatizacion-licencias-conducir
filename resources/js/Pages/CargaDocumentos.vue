<template>
    <AppLayout>
      <div class="min-h-screen bg-gray-800 text-white">
        <!-- Encabezado -->
        <header class="bg-gray-900 py-4 px-8 flex justify-between items-center">
          <div class="text-xl font-bold text-yellow-300">Carga de Documentos</div>
        </header>
  
        <!-- Contenedor principal -->
      <main class="max-w-5xl mx-auto py-6 bg-gray-700 p-6 rounded-lg">
        <h2 class="text-lg font-semibold mb-4">Sube los documentos necesarios</h2>

        <!-- Tabla de documentos -->
        <table class="table-auto w-full border border-gray-300 bg-gray-800 rounded-lg">
          <thead class="bg-gray-900">
            <tr class="text-center">
              <th class="p-2">Documento</th>
              <th class="p-2">Estado</th>
              <th class="p-2">Acción</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(doc, index) in files" :key="doc.id" class="text-center">
              <td class="p-2">{{ doc.Nombre }}</td>
              <td class="p-2">
                <span
                  :class="{
                    'text-yellow-300': doc.estado === 'Pendiente',
                    'text-blue-300': doc.estado === 'En Proceso',
                    'text-green-500': doc.estado === 'Completado',
                  }"
                >
                  {{ doc.estado }}
                </span>
              </td>
              <td class="p-2">
                <div class="flex items-center justify-center gap-2">
                  <input
                    ref="fileInput"
                    type="file"
                    @change="handleFileUpload($event, index)"
                    class="hidden"
                    :disabled="doc.estado === 'Completado'"
                  />
                  <button
                    @click="triggerFileInput(index)"
                    class="bg-green-500 text-black py-1 px-4 rounded hover:bg-green-600"
                    :disabled="doc.estado === 'Completado'"
                  >
                    {{ doc.estado === 'Completado' ? 'Cargado' : 'Cargar' }}
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>

        <!-- Botón para pasar a la siguiente pantalla -->
        <div class="text-center mt-6">
          <button @click="submitFiles" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
            Guardar y Continuar
          </button>
        </div>
      </main>
      </div>
    </AppLayout>
  </template>
  
  <script setup>
  import AppLayout from '@/Layouts/AppLayout.vue';
  import { ref } from 'vue';

  import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
  
  // Archivos iniciales recibidos desde Inertia
  const { props } = usePage();
 
  const files = props.files; // Array inicial de archivos con {id, nombre}

  // Simula la acción de seleccionar un archivo
const triggerFileInput = (index) => {
  const input = document.querySelectorAll('input[type="file"]')[index];
  input.click();
};

// Manejar la carga de un archivo
const handleFileUpload = (event, index) => {
    const file = event.target.files[0];
    console.log(files);
  if (file) {
    files[index].archivo = file;
    files[index].estado = 'En Proceso';
  }
};

// Enviar datos al servidor
const submitFiles = async () => {
  try {
    const formData = new FormData();

    files.forEach((doc) => {
      if (doc.archivo) {
        formData.append(doc.nombre, doc.archivo);
      }
    });

    

    // Actualizar estados a "Completado"
    files.forEach((doc) => {
      if (doc.archivo) {
        doc.estado = 'Completado';
      }
    });

    alert('Documentos enviados correctamente ahora seras redirigido a el proceso de pago del tramite');
    const response = await axios.post('api/start_pago'
    );
    window.location.href= response.data ;
  } catch (error) {
    console.error('Error al cargar los documentos:', error);
    alert('No se pudo cargar los documentos. Intenta de nuevo.');
  }
};
</script>

<style>
/* Estilo para mejorar la visibilidad */
table {
  border-collapse: collapse;
  margin: 0 auto;
  width: 100%;
}
th, td {
  border: 1px solid #ddd;
  padding: 8px;
}
th {
  text-align: center;
}
</style>