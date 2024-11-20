

<template >
    <AppLayout class="bg-gray-100" >
        <template #header>
            <h1 class="font-bold">Administrador de Roles</h1>
        </template>
        <hr><br>
        <div  >
                <br>
                <button @click="openCreate" class="bg-green-500 hover:bg-green-300 text-white font-bold py-1 px-4 border-b-4 border-green-700 hover:border-green-500 rounded float-top">
                    <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                    </svg>
                </button>
                <div class="form-group float-right rounded-full" >
                    <input type="search" placeholder="Buscar..." class="form-input bg-gray-200 text-white-500 rounded-full px-10 py-1 float-right">
                    <button class="bg-gray-500 hover:bg-gray-300 text-white font-bold py-1 px-4 border-b-4 border-gray-700 hover:border-gray-500 rounded-full float-right h-8">
                        <svg class="w-[15px] h-[15px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                        </svg>
                    </button>
                </div>
                <div class="relative overflow-x-auto rounded-2xl ">
    <table class="bg-gray-600 w-full text-sm  text-left rtl:text-right text-black-500 table-dark dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-green-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center">
                <th scope="col" class="px-6 py-3">
                   ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Guard Name
                </th>
                <th>Acciones </th>
            </tr>
        </thead>
        <tbody>
            <template  v-for="role in $page.props.datos.data" :key="role.id">

                <tr @click="openEditar(role)"class="bg-white border-gray-2 hover:bg-gray-200 text-center ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{role.id }}
                    </th>
                    <td class="px-6 py-4">
                        {{role.name}}
                    </td>
                    <td class="px-6 py-4">
                        {{role.guard_name}}
                    </td>
                    <td class="text-center" >
                    <Button class="bg-red-400 rounded w-1/3  " >
                        <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path  stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                        </svg>
                    </Button>
                   
                
                </td>
                    
                    
                </tr>
            </template>
            <!--modal editar-->
            <template v-if="mostrar" :rol="role">
            <div class="fixed inset-0  flex items-center justify-center bg-gray-900 bg-opacity-50 ">
                <div class="bg-white rounded-xl p-6 max-w-2xl w-full  shadow-2xl max-h-[800px] overflow-y-auto">
                    <!-- Título del modal -->
                    <h4>Editar ROL</h4>

                    <div class=" bg-red-400 rounded-lg text-center  w-[24px] h-[24px] float-right"
                        @click="mostrarModal">X</div>


                    <!-- Contenido del modal -->
                    <div class="grid   gap-4 text-gray-800 mb-6 space-y-4   ">
                        <form @submit.prevent="submit">
                            <div class="form-group text-black  ">
                                <label class="mr-2">ID :</label>
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                        <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                d="M2.9917 4.9834V18.917M9.96265 4.9834V18.917M15.9378 4.9834V18.917m2.9875-13.9336V18.917" />
                                            <path stroke="currentColor" stroke-linecap="round"
                                                d="M5.47925 4.4834V19.417m1.9917-14.9336V19.417M21.4129 4.4834V19.417M13.4461 4.4834V19.417" />
                                        </svg>
                                    </span>
                                    <input type="text" placeholder="rol"
                                        class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        v-model="rol.id" disabled />
                                </div>
                            </div>
                            <div class="form-group text-black  ">
                                <label class="mr-2">Nombre:</label>
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                        <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                d="M2.9917 4.9834V18.917M9.96265 4.9834V18.917M15.9378 4.9834V18.917m2.9875-13.9336V18.917" />
                                            <path stroke="currentColor" stroke-linecap="round"
                                                d="M5.47925 4.4834V19.417m1.9917-14.9336V19.417M21.4129 4.4834V19.417M13.4461 4.4834V19.417" />
                                        </svg>
                                    </span>
                                    <input type="text" placeholder="{{rol.name}}"
                                        class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        v-model="rol.name" />
                                </div>
                            </div>

                            
                            <div class=" flex mt-6 justify-end  space-x-4">
                                <button @click="guardar(rol)"
                                    class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded flex-1">Guardar</button>
                                <button @click="mostrarModal"
                                    class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded flex-1">Cancelar</button>
                            </div>
                        </form>
                    </div>



                </div>
            </div>
        </template>

            <!--modal crear-->
            <template v-if="mostrarCrear">
            <div class="fixed inset-0  flex items-center justify-center bg-gray-900 bg-opacity-50 ">
                <div class="bg-white rounded-xl p-6 max-w-2xl w-full  shadow-2xl max-h-[800px] overflow-y-auto">
                    <!-- Título del modal -->
                    <h4>Crear Rol</h4> <span>

                        <div class=" bg-red-400 rounded-lg text-center  w-[24px] h-[24px] float-right"
                            @click="openCreate">X</div>
                    </span>

                    <!-- Contenido del modal -->
                    <div class="grid   gap-4 text-gray-800 mb-6 space-y-4   ">
                        <form @submit.prevent="submit">

                            

                            <div class="form-group text-black ">
                                <label class="mr-2">*Nombre:</label>
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                        <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                d="M2.9917 4.9834V18.917M9.96265 4.9834V18.917M15.9378 4.9834V18.917m2.9875-13.9336V18.917" />
                                            <path stroke="currentColor" stroke-linecap="round"
                                                d="M5.47925 4.4834V19.417m1.9917-14.9336V19.417M21.4129 4.4834V19.417M13.4461 4.4834V19.417" />
                                        </svg>
                                    </span>
                                    <input type="text" placeholder="*Nombres"
                                        class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        v-model="form.name" />
                                </div>
                            </div>

                            <!-- Botones de acción -->
                            <div class=" flex mt-6 justify-end  space-x-4">
                                <button @click="crear(form)"
                                    class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded flex-1">Guardar</button>
                                <button @click="openCreate"
                                    class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded flex-1">Cancelar</button>
                            </div>
                        </form>
                    </div>



                </div>
            </div>
        </template>
        </tbody>
                </table>
            </div>
        </div>
        <div></div>
    </AppLayout>    
</template>
<script>
export default {
    name: 'RolesIndex'
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {ref, computed} from 'vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';

const rol = ref({});
const form = useForm({
    name: '',
});

const mostrar = ref(false);
const mostrarCrear = ref(false);
const openCreate = () => {
    mostrarCrear.value = !mostrarCrear.value;
}
const mostrarModal = () =>{
    mostrar.value=!mostrar.value;
}
const crear = (form) =>{
    console.log(form);
}
const openEditar= (role) => {
    mostrarModal();
    rol.value=role;
}
</script>