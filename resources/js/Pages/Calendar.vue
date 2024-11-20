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
          </div>
        </section>

        <!-- Calendario Dinámico -->
        <section class="bg-gray-700 p-4 rounded-lg">
          <div class="flex flex-col items-center">
            <h2 class="text-lg font-semibold mb-4">
              Agendar Hora para <span class="text-yellow-300">Licencia de Conducir</span>
            </h2>

            <div class="bg-white text-black p-4 rounded-lg shadow-md w-full max-w-md">
              <div class="flex justify-between mb-4">
                <button @click="changeMonth(-1)">Mes Anterior</button>
                <span>{{ currentMonthLabel }}</span>
                <button @click="changeMonth(1)">Próximo Mes</button>
              </div>
              <div class="grid grid-cols-7 gap-2 text-center">
                <!-- Días de la semana -->
                <span>lun</span><span>mar</span><span>mié</span><span>jue</span><span>vie</span><span>sáb</span><span>dom</span>
                <!-- Días del mes -->
                <div v-for="day in calendarDays" :key="day.date" class="p-2 rounded cursor-pointer"
                  @click="selectDay(day)"
                  :class="{
                    'bg-red-500 text-white': day.status === 'reservado',
                    'bg-green-500 text-white': day.status === 'disponible',
                    'bg-gray-300 text-gray-600': day.status === 'sin asignar',
                  }"
                >
                  {{ day.day }}
                </div>
              </div>
            </div>

            <!-- Bloques horarios -->
            <div v-if="selectedDay" class="mt-6">
              <h3 class="text-yellow-300">Horarios para {{ selectedDayLabel }}</h3>
              <div class="grid grid-cols-4 gap-2 mt-4">
                <div
                  v-for="block in timeBlocks"
                  :key="block.time"
                  class="p-2 text-center rounded"
                  :class="{
                    'bg-red-500 text-white': block.status === 'reservado',
                    'bg-green-500 text-white': block.status === 'disponible',
                  }"
                @click="selectHora">
                  {{ block.time }}
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref, computed } from 'vue';

const currentMonth = ref(new Date().getMonth());
const currentYear = ref(new Date().getFullYear());
const calendarDays = ref([]);
const selectedDay = ref(null);
const timeBlocks = ref([]);

// Cambiar el mes
const changeMonth = (increment) => {
  currentMonth.value += increment;
  if (currentMonth.value > 11) {
    currentMonth.value = 0;
    currentYear.value++;
  } else if (currentMonth.value < 0) {
    currentMonth.value = 11;
    currentYear.value--;
  }
  generateCalendar();
};

// Generar calendario alineado con los días de la semana
const generateCalendar = () => {
  const firstDayOfMonth = new Date(currentYear.value, currentMonth.value, 1).getDay(); // Día de la semana del primer día
  const totalDays = new Date(currentYear.value, currentMonth.value + 1, 0).getDate(); // Total de días del mes

  calendarDays.value = [];
  // Añadir días vacíos antes del inicio
  for (let i = 0; i < (firstDayOfMonth === 0 ? 6 : firstDayOfMonth - 1); i++) {
    calendarDays.value.push({ day: '', status: 'sin asignar' });
  }

  // Añadir días del mes con estados
  for (let day = 1; day <= totalDays; day++) {
    calendarDays.value.push({
      day,
      date: new Date(currentYear.value, currentMonth.value, day),
      status: day % 2 === 0 ? 'disponible' : 'reservado',
    });
  }
};
generateCalendar();

// Seleccionar un día
const selectDay = (day) => {
  selectedDay.value = day;
  generateTimeBlocks();
};

// Generar bloques horarios
const generateTimeBlocks = () => {
  const startHour = 9;
  const endHour = 14;
  timeBlocks.value = [];
  for (let h = startHour; h < endHour; h++) {
    for (let m = 0; m < 60; m += 15) {
      const time = `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}`;
      timeBlocks.value.push({
        time,
        status: m % 2 === 0 ? 'disponible' : 'reservado',
      });
    }
  }
};

const currentMonthLabel = computed(() => {
  const date = new Date(currentYear.value, currentMonth.value);
  return date.toLocaleString('es-ES', { month: 'long', year: 'numeric' });
});
const selectHora = () => {
  window.location.href = ('/form-salud');
}
const selectedDayLabel = computed(() => {
  if (!selectedDay.value) return '';
  return selectedDay.value.date.toLocaleDateString('es-ES');
});
</script>
