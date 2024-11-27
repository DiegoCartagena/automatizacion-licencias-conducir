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
                    'text-yellow-300': doc.estado === 'pendiente',
                    'text-blue-300': doc.estado === 'En Proceso',
                    'text-green-500': doc.estado === 'enviado',
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
                    :disabled="doc.estado === 'enviado'"
                  >
                    {{ doc.estado === 'enviado' ? 'Cargado' : 'Cargar' }}
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
  import { ref,  onMounted } from 'vue';

  import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
  
  // Archivos iniciales recibidos desde Inertia
  const { props } = usePage();
 const page = usePage();
 const solicitud = ref({});
 const id =ref(0);
  const files = props.files; // Array inicial de archivos con {id, nombre, estado,url.b64,tipo}

  // Simula la acción de seleccionar un archivo
const triggerFileInput = (index) => {
  const input = document.querySelectorAll('input[type="file"]')[index];
  input.click();
};

// Manejar la carga de un archivo
const handleFileUpload = async(event, index) => {
    const file = event.target.files[0];
    console.log(file);
  if (file) {
    // Crear un objeto FormData para enviar el archivo al backend
    const formData = new FormData();
    formData.append('archivo', file); // Archivo cargado
    formData.append('estado', files[index].estado); // Otros atributos necesarios
    formData.append('id_solicitud', id.value);
    formData.append('usuario_actualizacion', page.props.auth.user.id);
    formData.append('usuario_creacion', page.props.auth.user.id);
    formData.append('nombre', files[index].Nombre);
    formData.append('tipo', file.name.split('.').pop().toLowerCase());
    try {
      // Enviar la solicitud al backend
      const response = await axios.post('/api/create-documento', formData, {
        headers: { 'Content-Type': 'multipart/form-data' }, // Importante para enviar archivos
      });

      // Actualizar el estado del archivo después de la respuesta del backend
      files[index].estado = 'En Proceso';
      console.log('Archivo enviado exitosamente:', response.data);
    } catch (error) {
      console.error('Error al enviar el archivo:', error);
      files[index].estado = 'Error al enviar';
    }
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
        doc.estado = 'enviado';
      }
    });
 
    alert('Documentos enviados correctamente ahora seras redirigido a el proceso de pago del tramite');
    id.value = localStorage.getItem('id_solicitud');
    const res = await axios.post('/api/edit-solicitud',{id:id,step:'Pago'});
    console.log(solicitud.value);
   const response = await axios.post('api/start_pago',{id_solicitud:id,solicitud:solicitud.value});
    console.log(response);
    window.location.href= response.data ;
  } catch (error) {
    console.error('Error al cargar los documentos:', error);
    alert('No se pudo cargar los documentos. Intenta de nuevo.');
  }
};
onMounted( async()=>{
     id.value = localStorage.getItem('id_solicitud');
   const step = await axios.post('/api/edit-solicitud',{id:id.value,step:'Carga documentos'});
    if(step.data.res){
     solicitud.value= step.data.solicitud;
     
    }
})
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