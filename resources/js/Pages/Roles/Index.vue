<script>
export default {
    name: 'RolesIndex'
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {ref} from 'vue';

</script>

<template >
    <AppLayout class="bg-gray-100" >
        <template #header>
            <h1 class="font-bold">Administrador de Roles</h1>
        </template>
        <hr><br>
        <div  >
                <br>
                <button class="bg-green-500 hover:bg-green-300 text-white font-bold py-1 px-4 border-b-4 border-green-700 hover:border-green-500 rounded float-top">
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
            <tr >
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

                <tr class="bg-white border-gray-2 hover:bg-gray-200 ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{role.id }}
                    </th>
                    <td class="px-6 py-4">
                        {{role.name}}
                    </td>
                    <td class="px-6 py-4">
                        {{role.guard_name}}
                    </td>
                    <td>
                    <Button class="bg-red-400 rounded w-1/3 " >
                        <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                        </svg>
                    </Button>
                    <Button class="bg-red-400 rounded w-1/3 " >
                        <svg class="w-[24px] h-[24px]  text-gray-800  dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                        </svg>
                    </Button>
                
                </td>
                    
                    
                </tr>
            </template>
        </tbody>
                </table>
            </div>
        </div>
        <div></div>
    </AppLayout>    
</template>