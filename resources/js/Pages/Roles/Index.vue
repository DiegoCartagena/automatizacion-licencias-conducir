<script>
export default {
    name: 'RolesIndex'
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

</script>

<template>
    <AppLayout>
        <template #header>
            <h1 class="font-semibold">Roles</h1>
        </template>
        <div class="container">
                <br>
                <button class="bg-blue-500 hover:bg-blue-300 text-white font-bold py-1 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded float-top">
                 Buscar
                </button>
            
                <input type="search" class="form-input rounded-full px-4 py-1 float-right">
                <div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha Creacion
                </th>
            </tr>
        </thead>
        <tbody>
            <template v-for="user in $page.props.datos.data" :key="user.id">

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{user.id }}
                    </th>
                    <td class="px-6 py-4">
                        {{user.name}}
                    </td>
                    <td class="px-6 py-4">
                        {{user.email}}
                    </td>
                    <td class="px-6 py-4">
                        {{ user.created_at }}
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