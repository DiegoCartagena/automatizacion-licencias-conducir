<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
   <h1>Hello World</h1>
   <button v-if="$page.props.user.permission.includes('crear roles')" >Administrar roles</button>
   <button v-if="$page.props.user.roles.includes('admin')" >Administrar usuarios</button>
</template>
