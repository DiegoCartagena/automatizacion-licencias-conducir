<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
const logout = () => {
    router.post(route('logout'));
};

</script>

<template>
    <AppLayout title="Dashboard">
        <!-- Encabezado -->

        <div class="flex justify-end bg-gray-800 text-white items-center w-full px-10 ">
            <img src="/assets/logo-florida.svg" alt="Logo La Florida" class="w-24">
            <div class="text-white text-xl font-semibold float-rigth">
                {{ new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) }}
            </div>
        </div>
        <div class="min-h-screen bg-gray-100 text-white flex items-center justify-center py-10">
            <!-- Contenedor principal dividido en dos columnas -->
            <div class="flex w-full max-w-6xl space-x-6">

                <!-- Columna izquierda: Perfil de usuario -->
                <div class="bg-gray-300 text-black p-6 rounded-lg shadow-lg w-1/3">
                    <h2 class="text-lg font-bold mb-4">Perfil de <span class="text-yellow-500">Administrador</span></h2>
                    <div class="flex flex-col items-center">
                        <div class="bg-gray-700 rounded-full w-24 h-24 flex items-center justify-center mb-4">
                            <!-- Icono de perfil de usuario (puedes reemplazarlo por una imagen de perfil) -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A15.93 15.93 0 0112 15.5c2.738 0 5.3.686 7.121 1.804M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <p class="text-center text-lg font-semibold">{{$page.props.auth.user.name.toUpperCase()}}</p>
                        <p class="text-center text-sm text-yellow-500">{{$page.props.user.roles[0].toUpperCase()}}</p>
                        <ul class="mt-4 space-y-2 text-sm">
                            <li><a href="/user/profile" class="hover:text-gray-300">Datos personales</a></li>
                            <li><a href="/user/profile" class="hover:text-gray-300">Cambiar Contraseña</a></li>
                            <li><a href="#" @click="logout" class="hover:text-gray-300">Cerrar Sesión</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Columna derecha: Trámites -->
                <div class="bg-gray-300 text-black p-6 rounded-lg shadow-lg flex-grow">
                    <h2 class="text-lg font-bold mb-6">Trámites <span class="text-yellow-500">disponibles</span></h2>
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Trámite 1 -->
                        <a v-if="$page.props.user.roles == 'admin'" href="/users">

                            <div v-if="$page.props.user.roles.includes('admin')"
                                class="bg-green-700 scale-75 hover:scale-100 hover:bg-green-800 rounded-lg p-4 flex flex-col items-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-3 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 17.804A15.93 15.93 0 0112 15.5c2.738 0 5.3.686 7.121 1.804M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <p class="text-center">Administrar Usuarios</p>
                            </div>
                        </a>

                        <!-- Trámite 2 -->
                        <a href="/solicitudes" v-if="$page.props.user.roles == 'admin'">
                            <div
                                class="bg-green-500 scale-75 hover:bg-green-500 hover:scale-100 rounded-lg p-4 flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-3 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                <p class="text-center">Solicitudes</p>
                            </div>
                        </a>
                        <a v-if="$page.props.user.roles != 'admin'">
                            <div
                                class="bg-green-500 scale-75 hover:bg-green-500 hover:scale-100 rounded-lg p-4 flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-3 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                <p class="text-center">Agendar Hora Mascotas</p>
                            </div>
                        </a>

                        <!-- Trámite 3 -->
                        <a :href="'/step2/'+$page.props.auth.user.id ">

                            <div
                                class="bg-green-700 scale-75 hover:bg-green-800 hover:scale-100 rounded-lg p-4 flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-3 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h14m-7-7v14" />
                                </svg>
                                <p class="text-center">Agenda Licencias de Conducir</p>
                            </div>
                        </a>

                        <!-- Trámite 4 -->
                        <a href="/roles" v-if="$page.props.user.roles == 'admin'">

                            <div
                                class="bg-green-700 scale-75 hover:scale-100 hover:bg-green-800 rounded-lg p-4 flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-3 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m2 0h2a2 2 0 012 2v4a2 2 0 01-2 2h-2m-6 0H9m-2 0H5a2 2 0 01-2-2v-4a2 2 0 012-2h2m6-8h6M6 4h.01M10 4h.01M14 4h.01M18 4h.01M6 20h.01M10 20h.01M14 20h.01M18 20h.01" />
                                </svg>
                                <p class="text-center">Administrar Roles</p>
                            </div>
                        </a>
                        <a v-else>

                            <div
                                class="bg-green-700 scale-75 hover:scale-100 hover:bg-green-800 rounded-lg p-4 flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-3 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m2 0h2a2 2 0 012 2v4a2 2 0 01-2 2h-2m-6 0H9m-2 0H5a2 2 0 01-2-2v-4a2 2 0 012-2h2m6-8h6M6 4h.01M10 4h.01M14 4h.01M18 4h.01M6 20h.01M10 20h.01M14 20h.01M18 20h.01" />
                                </svg>
                                <p class="text-center">Ubicación Ferias Libres</p>
                            </div>
                        </a>

                        <!-- Trámite 5 -->
                        <a
                            href="https://pago.smc.cl/pagoPCVv2/Login.aspx?ReturnUrl=%2fpagoPCVv2%2fSistema%2fPrincipal.aspx">
                            <div
                                class="bg-green-700 scale-75 hover:scale-100 hover:bg-green-800 rounded-lg p-4 flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-3 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h10M7 11h10m-4 4h4m-6 0H7m6 4h-4M4 21a2 2 0 002-2v-1h12v1a2 2 0 002 2H4zm2-14h.01M12 3h.01M18 3h.01" />
                                </svg>
                                <p class="text-center">Pago de Permiso de Circulación</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
