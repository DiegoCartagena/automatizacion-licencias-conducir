    <template>
<AppLayout>
        <div class="min-h-screen bg-gray-800 text-white">
          <!-- Encabezado con Logo y Menú de Navegación -->
          <header class="bg-gray-900 py-4 px-8 flex justify-between items-center">
            <div class="text-xl font-bold text-yellow-300">La Florida - Me Importas Tú</div>
            <div class="flex items-center gap-4">
              <a href="#" class="text-sm text-gray-400">Volver al menú de aplicaciones</a>
              <a href="#" class="text-sm text-gray-400">Inicio</a>
              <a href="#" class="text-sm text-gray-400">Mis horas agendadas</a>
            </div>
          </header>
      
          <main class="max-w-5xl mx-auto py-6">
            <!-- Información de colores de los cupos -->
            <section class="bg-gray-700 p-4 rounded-lg mb-6">
              <h2 class="text-lg font-semibold mb-4">Información:</h2>
              <div class="space-y-2">
                <div class="flex items-center gap-2">
                  <span class="w-4 h-4 bg-red-500 rounded-full"></span>
                  <span>Fechas sin cupos disponibles.</span>
                </div>
                <div class="flex items-center gap-2">
                  <span class="w-4 h-4 bg-green-500 rounded-full"></span>
                  <span>Fechas con cupos disponibles.</span>
                </div>
                <div class="flex items-center gap-2">
                  <span class="w-4 h-4 bg-gray-500 rounded-full"></span>
                  <span>No se han asignado cupos para esa fecha.</span>
                </div>
              </div>
            </section>
      
            <!-- Calendario y mensaje importante -->
            <section class="bg-gray-700 p-4 rounded-lg">
              <div class="flex flex-col items-center">
                <h2 class="text-lg font-semibold mb-4">Agendar Hora para <span class="text-yellow-300">Licencia de Conducir</span></h2>
                
                <!-- Calendario -->
                <div class="bg-white text-black p-4 rounded-lg shadow-md w-full max-w-xs">
                  <!-- Aquí iría tu código de calendario -->
                  <div class="flex justify-between mb-4">
                    <button>Octubre</button>
                    <span>Noviembre 2024</span>
                    <button>Diciembre</button>
                  </div>
                  <!-- Ejemplo de calendario básico -->
                  <div class="grid grid-cols-7 gap-2 text-center">
                    <!-- Días de la semana -->
                    <span>lun</span><span>mar</span><span>mié</span><span>jue</span><span>vie</span><span>sáb</span><span>dom</span>
                    <!-- Días del mes con estilo rojo -->
                    <span class="bg-red-500 text-white p-1 rounded">1</span>
                    <span class="bg-red-500 text-white p-1 rounded">2</span>
                    <span class="bg-red-500 text-white p-1 rounded">3</span>
                    <span class="bg-red-500 text-white p-1 rounded">4</span>
                    <span class="bg-green-500 text-white p-1 rounded">5</span>
                    <span class="bg-red-500 text-white p-1 rounded">6</span>
                    <!-- Añadir más días según sea necesario -->
                  </div>
                  <p class="text-center mt-4 text-sm">HOY: Domingo, 3 de Noviembre de 2024</p>
                </div>
                
                <!-- Mensaje importante -->
                <p class="text-xs mt-4 text-yellow-300">
                  <strong>IMPORTANTE:</strong> En caso de que la Agenda se encuentre sin cupos <span class="text-red-500">(en rojo)</span>, los nuevos cupos se habilitan los días 15 y 30 (hábiles) de cada mes, entre las 9:00 y las 14:00 hrs. En caso de que la fecha ocurra en día inhábil, la disponibilidad se materializará el hábil siguiente.
                </p>
              </div>
            </section>
          </main>
        </div>
    </AppLayout>
      </template>    
<script setup>
  import AppLayout from '@/Layouts/AppLayout.vue';
</script>