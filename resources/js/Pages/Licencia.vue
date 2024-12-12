<script setup>
import { ref } from "vue";
import { usePage } from "@inertiajs/vue3";
import  html2pdf  from "html2pdf.js";
// Obtener datos pasados desde el backend
const { props } = usePage();
const datos ={
        fotoUrl :'storage/DocumentosCargados/Certificado_de_estudios-54.jpeg', // Ruta de la foto
        nombre :'Diego Cartagena Navarrete',
        rut :'19.219.768-6',
        direccion :'Samurai 1258',
        comuna :'La Florida',
        fechaEmision :'12/12/2024',
        fechaExpiracion :'16/10/2030',
        restricciones :'Sin restricciones',
        codigoBarras :'22814764',
};

// Función para generar PDF
const imprimirPDF = () => {
  const elemento = document.getElementById("licencia-completa");    
  const opciones = {
    margin: 0,
    filename: "licencia-conducir.pdf",
    image: { type: "jpeg", quality: 1 },
    html2canvas: { scale: 1 },
    jsPDF: { unit: "mm", format: "a4", orientation: "portrait" },
  };
  html2pdf(elemento,opciones);
};
</script>

<template>
  <AppLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Licencia de Conducir
      </h2>
    </template>

    <div class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Contenedor de ambas caras -->
        <div id="licencia-completa">
          <!-- Cara frontal -->
          <div
            class="relative w-[8.5cm] h-[5.4cm] mx-auto mb-6 border border-gray-400 rounded-md overflow-hidden shadow-lg page-break"
            style="background-color: #f9e4c8"
          >
            <!-- Fondo con ondas -->
            <div class="absolute inset-0">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
        <!-- Patrón para las ondas -->
        <defs>
          <pattern
            id="ondas"
            x="0"
            y="0"
            width="40"
            height="40"
            patternUnits="userSpaceOnUse"
          >
            <path
              d="M0 10 C 10 20, 30 0, 40 10 S 70 20, 80 10"
              fill="none"
              stroke="#d1b97e"
              stroke-width="1.5"
            />
          </pattern>
        </defs>
        <!-- Aplicar el patrón al fondo -->
        <rect width="100%" height="100%" fill="url(#ondas)" />
      </svg>
    </div>
            <!-- Contenido de la licencia frontal -->
            <div class="relative flex flex-col p-4">
              <!-- Foto -->
              <div style="transform-origin: top right;" class=" flex justify-center items-center">
                <img
                  :src="datos.fotoUrl"
                  alt="Foto del conductor"
                  class=" w-[2.5cm] h-[3cm]  border-gray-400 rounded "
                />
                <!-- Datos del conductor -->
                <div class="ml-4 text-xs">
                  <h3 class="text-sm font-bold">LICENCIA DE CONDUCTOR</h3>
                  <h3 class="text-center">REPÚBLICA DE CHILE</h3>
                  <p><strong>Nombre:</strong> {{ datos.nombre }}</p>
                  <p><strong>RUT:</strong> {{ datos.rut }}</p>
                  <p><strong>Dirección:</strong> {{ datos.direccion }}</p>
                  <p><strong>Comuna:</strong> {{ datos.comuna }}</p>
                  <p><strong>Fecha de emisión:</strong> {{ datos.fechaEmision }}</p>
                  <p><strong>Fecha de expiración:</strong> {{ datos.fechaExpiracion }}</p>
                </div>
            </div>
              <!-- Marca de agua -->
              <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-gray-500 text-xl font-bold opacity-10 pointer-events-none"
              >
                DEMO
              </div>
            </div>
          </div>

          <!-- Cara posterior -->
          <div
            class="relative w-[8.5cm] h-[5.4cm] mx-auto border border-gray-400 rounded-md overflow-hidden shadow-lg"
            style="background-color: #f4e4c5"
          >
            <!-- Contenido de la licencia posterior -->
            <div class="absolute inset-0">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
        <!-- Patrón para las ondas -->
        <defs>
          <pattern
            id="ondas"
            x="0"
            y="0"
            width="40"
            height="40"
            patternUnits="userSpaceOnUse"
          >
            <path
              d="M0 10 C 10 20, 30 0, 40 10 S 70 20, 80 10"
              fill="none"
              stroke="#d1b97e"
              stroke-width="1.5"
            />
          </pattern>
        </defs>
        <!-- Aplicar el patrón al fondo -->
        <rect width="100%" height="100%" fill="url(#ondas)" />
      </svg>
    </div>
            <!-- Restricciones -->
            <div class="relative p-4">
              <h2 class="text-lg font-bold text-center">RESTRICCIONES</h2>
              <p class="text-sm text-center">
                <strong>Especialidad:</strong> {{ datos.especialidad }}
              </p>
              <p class="text-sm text-center">
                <strong>Donante de Órganos:</strong> {{ datos.donante ? "Sí" : "No" }}
              </p>
              <!-- Código de licencia -->
              <div class="mt-4 text-center">
                <p class="text-xs">CA {{ datos.codigoLicencia }}</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Botón para imprimir -->
        <div class="mt-6 text-center">
          <button
            @click="imprimirPDF"
            class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 focus:outline-none"
          >
            Imprimir como PDF
          </button>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<style scoped>
.page-break {
  page-break-after: always;
}
</style>
