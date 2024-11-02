<template>
    <div class="min-h-screen bg-gray-800 text-white flex flex-col items-center pt-6">
      <!-- Breadcrumb -->
      <div class="w-full px-8 text-sm text-gray-400 mb-4">
        <a href="#" class="hover:text-gray-300">Volver al menú de aplicaciones</a> &gt;
        <a href="#" class="hover:text-gray-300">Inicio</a> &gt;
        <span class="text-gray-500">Licencias agendadas</span>
      </div>
  
      <!-- Sección 1: Datos del solicitante -->
      <div class="bg-gray-900 w-full max-w-4xl p-6 rounded-lg shadow-lg mb-6">
        <h2 class="text-lg font-bold mb-4">Datos personales <span class="text-yellow-500">del solicitante</span></h2>
        <div class="grid grid-cols-2 gap-4 text-sm">
          <p><span class="font-semibold">RUT:</span> 19217923-6</p>
          <p><span class="font-semibold">Nombre Completo:</span> DIEGO ESTEBAN CARTAGENA NAVARRETE</p>
          <p><span class="font-semibold">Domicilio:</span> CORCOVADO 4543</p>
          <p><span class="font-semibold">Teléfono:</span> 56971983</p>
          <p><span class="font-semibold">Comuna:</span> LA FLORIDA</p>
        </div>
        <div class="bg-yellow-100 text-yellow-800 mt-4 p-3 rounded">
          <p>📅 Faltan <span class="font-bold">2 años 11 meses 14 días</span> para su próximo control. (Fecha control: 16-10-2027)</p>
        </div>
      </div>
  
      <!-- Sección 2: Histórico de licencias -->
      <div class="bg-gray-900 w-full max-w-4xl p-6 rounded-lg shadow-lg mb-6">
        <h2 class="text-lg font-bold mb-4">Mi Historial de <span class="text-yellow-500">Licencia</span></h2>
        <table class="w-full text-sm text-left">
          <thead>
            <tr class="bg-gray-800">
              <th class="p-3">Folio</th>
              <th class="p-3">Clases</th>
              <th class="p-3">Fecha de Confección</th>
              <th class="p-3">Fecha de Vencimiento</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b border-gray-700">
              <td class="p-3">14364333</td>
              <td class="p-3">B</td>
              <td class="p-3">03 Dic 2014</td>
              <td class="p-3">16 Oct 2020</td>
            </tr>
            <tr class="border-b border-gray-700">
              <td class="p-3">14386506</td>
              <td class="p-3">B</td>
              <td class="p-3">03 Ene 2015</td>
              <td class="p-3">16 Oct 2020</td>
            </tr>
            <tr class="border-b border-gray-700">
              <td class="p-3">16073639</td>
              <td class="p-3">B</td>
              <td class="p-3">14 Jun 2016</td>
              <td class="p-3">16 Oct 2020</td>
            </tr>
            <tr>
              <td class="p-3">20298032</td>
              <td class="p-3">B</td>
              <td class="p-3">10 Feb 2021</td>
              <td class="p-3">16 Oct 2027</td>
            </tr>
          </tbody>
        </table>
        <!-- Paginación -->
        <div class="flex justify-between items-center mt-4">
          <button class="bg-gray-700 text-gray-400 py-1 px-3 rounded hover:bg-gray-600">Anterior</button>
          <span class="text-gray-400">Página 1 de 1</span>
          <button class="bg-gray-700 text-gray-400 py-1 px-3 rounded hover:bg-gray-600">Siguiente</button>
        </div>
      </div>
  
      <!-- Sección 3: Trámites disponibles -->
      <div class="bg-gray-900 w-full max-w-4xl p-6 rounded-lg shadow-lg mb-6 flex justify-between items-center">
        <p class="text-lg font-bold">Trámites con licencia <span class="text-yellow-500">en la comuna</span></p>
        <div class="flex space-x-4">
          <button class="bg-blue-700 hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded-lg">
            Renovación de licencia / Ampliación de clase
          </button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'LicenseHistory',
  };
  </script>
  
  <style scoped>
  /* Puedes añadir estilos adicionales si es necesario */
  </style>
  