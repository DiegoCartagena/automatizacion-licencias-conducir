  
  <template>
<AppLayout>
    <div class="min-h-screen bg-gray-800 text-white flex flex-col items-center pt-6">
      <!-- Breadcrumb -->
      <div class="w-full px-8 text-sm text-gray-400 mb-4">
        <a href="/dashboard" class="hover:text-gray-300">Volver al menú de aplicaciones</a> &gt;
        <a href="#" class="hover:text-gray-300">Inicio</a> &gt;
        <span class="text-gray-500">Licencias agendadas</span>
      </div>
  
      <!-- Sección 1: Datos del solicitante -->
      <div class="bg-gray-900 w-full max-w-4xl p-6 rounded-lg shadow-lg mb-6">
        <h2 class="text-lg font-bold mb-4">Datos personales <span class="text-yellow-500">del solicitante</span></h2>
        <div class="grid grid-cols-2 gap-4 text-sm">
          <p><span class="font-semibold">RUT:</span> {{$page.props.auth.user.rut}}</p>
          <p><span class="font-semibold">Nombre Completo:</span> {{$page.props.auth.user.name.toUpperCase()+' '+ $page.props.auth.user.aPaterno.toUpperCase()+' '+ $page.props.auth.user.aMaterno.toUpperCase()}}</p>
          <p><span class="font-semibold">Domicilio:</span> {{$page.props.auth.user.calle+' '+$page.props.auth.user.numero}}</p>
          <p><span class="font-semibold">Teléfono:</span>{{$page.props.auth.user.telefono}}</p>
          <p><span class="font-semibold">Comuna:</span> {{$page.props.usuario.comuna.toUpperCase()}}</p>
        </div>
        <div class="bg-yellow-100 text-yellow-800 mt-4 p-3 rounded">
          <p>📅 Faltan <span class="font-bold">2 años 11 meses 14 días</span> para su próximo control. (Fecha control: 16-10-2027)</p>
        </div>
      </div>
  
      <!-- Sección 2: Histórico de licencias -->
      <div class="text-center bg-gray-900 w-full max-w-4xl p-6 rounded-lg shadow-lg mb-6">
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
            <template v-for="(licencia,i ) in $page.props.usuario.licencias " :key="i">
              <tr  class="border-b border-gray-700">
                <td class="p-3">{{licencia.folio}}</td>
                <td class="p-3">{{licencia.tipo}}</td>
                <td class="p-3">{{formatDate(licencia.created_at)}}</td>
                <td class="p-3">16 Oct 2020</td>
              </tr>
            </template>
            
          </tbody>
        </table>
        <!-- Paginación -->
        <div class="flex justify-between  items-center mt-4">
          <button class="bg-gray-700 text-gray-400 py-1 px-3 rounded hover:bg-gray-600">Anterior</button>
          <span class="text-gray-400">Página 1 de 1</span>
          <button class="bg-gray-700 text-gray-400 py-1 px-3 rounded hover:bg-gray-600">Siguiente</button>
        </div>
      </div>
  
      <!-- Sección 3: Trámites disponibles -->
      <div class="text-center space-y-20 bg-gray-900 w-full max-w-4xl p-6 rounded-lg shadow-lg mb-6 flex justify-center items-center">
        
        <div class="space-y-4 ">
          <p class="text-lg font-bold">Trámites con licencia <span class="text-yellow-500">en la comuna</span></p>
        
          <!-- Botón 1 -->
          <button @click="mostrarModal" class="bg-blue-700 hover:bg-blue-800 rounded-lg p-4 w-full text-center">Renovación de Licencia / Ampliación de Clase</button>
          <!-- Botón 2 -->
          <button @click="step3" class="bg-blue-700 hover:bg-blue-800 rounded-lg p-4 w-full text-center">Duplicados</button>
          <!-- Botón 3 -->
          <button @click="redirectTo" class="bg-blue-700 hover:bg-blue-800 rounded-lg p-4 w-full text-center">Preguntas frecuentes</button>
          <!-- Botón 4 
          <button class="bg-blue-700 hover:bg-blue-800 rounded-lg p-4 w-full text-center">Agenda Hora Mascotas</button>
          
          <button class="bg-blue-700 hover:bg-blue-800 rounded-lg p-4 w-full text-center">Trámites Sociales</button>
          
          <button class="bg-blue-700 hover:bg-blue-800 rounded-lg p-4 w-full text-center">Consulta Estado de Multas</button>
          
          <button class="bg-blue-700 hover:bg-blue-800 rounded-lg p-4 w-full text-center">Inscripción a Cursos de Manejo</button>-->
        </div>
        
      </div>
    </div>
    <template v-if="mostrar" >
  <div class="fixed inset-0  flex items-center justify-center bg-gray-900 bg-opacity-50 z-50">
    <div class="bg-white rounded-xl p-6 max-w-2xl w-full  shadow-2xl">
      <!-- Título del modal -->
      <h2 class="text-center text-2xl font-bold text-gray-800 mb-4 underline">
        CONDICIONES GENERALES
      </h2>

      <!-- Contenido del modal -->
      <div class="text-gray-800 mb-6 space-y-4">
        <p>Para la Reserva de su Hora, deberá tener presente las siguientes condiciones:</p>
        
        <p class="flex items-start">
          <span class="mr-2 text-lg font-semibold">•</span>
          La Reserva de Hora es de carácter personal e intransferible, por tanto su toma no puede realizarla en calidad de intermediario(a).
        </p>
        
        <p class=" break-words  items-start">
          <span class="mr-2 text-lg font-semibold">•</span>
          De forma previa a la toma de hora debe tener conocimiento de los requisitos de presentación informados en la página web de Licencias de Conducir 
          <a href="https://www.laflorida.cl/sitio/licencia-de-conducir/" class=" text-blue-600 underline mr-2">ver aquí</a>, cuya documentación deberá presentarla en estado de original(es) en la fecha y hora de reserva.
        </p>

        <p class=" items-start">
          <span class="mr-2 text-lg font-semibold">•</span>
          Una vez que tenga acceso a la Agenda y en caso ésta se encuentre sin cupos<strong style="color: red;"> (en rojo) </strong>, los nuevos cupos se habilitan los días 15 y 30 (hábiles) de cada mes, entre las 09:00 a 14:00hrs.
        </p>

        <p class="flex items-start">
          <span class="mr-2 text-lg font-semibold">•</span>
          <span class="italic underline">
            "La documentación que se presente en la fecha y hora de reserva será revisada y validada por personal de licencias de conducir, y en caso de detectarse inconsistencia(s), la solicitud será rechazada."
          </span>
        </p>
      </div>

      <!-- Checkbox de aceptación de condiciones -->
      <div class="flex items-center mb-6">
        <input type="checkbox" id="aceptar-condiciones" class="mr-2">
        <label for="aceptar-condiciones" class="text-gray-800">
          Declaro haber leído y comprendido las Condiciones para la Reserva de Hora.
        </label>
      </div>

      <!-- Botones de acción -->
      <div class="flex justify-center space-x-4">
        <button @click="step3" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded flex-1">Aceptar Condiciones</button>
        <button @click="mostrarModal" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded flex-1">Cancelar</button>
      </div>
    </div>
  </div>
</template>
  </AppLayout>
  </template>
  
  <script setup>
import { ref, computed} from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
  import AppLayout from '@/Layouts/AppLayout.vue';
  const mostrar = ref(false);

  const mostrarModal=()=>{
    mostrar.value = !mostrar.value;
  }
  const redirectTo=()=>{
    window.location.href=('https://www.laflorida.cl/sitio/licencias-de-conducir-preguntas-frecuentes/');
  }
  const step3 = () =>{
    //crear solicitud -> con datos del usuario y tipo de tramite 
      window.location.href = ('/Calendar');
  }

  const formatDate=(fecha)=>{
    computed(() => {
    const date = new Date(fecha);
    return date.toLocaleDateString('es-ES', {
      day: 'numeric',
      month: 'short',
      year: 'numeric'
    }).replace('.', ''); 
  });
  }
  </script>
  
  <style scoped>
  /* Puedes añadir estilos adicionales si es necesario */
  .modal{
    width: 80%;
    height: auto;
  }
  </style>
  