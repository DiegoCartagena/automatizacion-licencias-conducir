<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template  >
    <Head title="Log in" />

    <AuthenticationCard style="background-color:#2a3b47;">
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

    <div >
        <form @submit.prevent="submit">
            <div class="login-card">
                <h2>Inicio de Sesión</h2>
          <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Email" v-model="form.email" />
          </div>
          <div class="input-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" placeholder="Contraseña" v-model="form.password" />
          </div>
          
          
          
          <div class="block mt-4">
              <label class="flex items-center">
                  <Checkbox v-model:checked="form.remember" name="remember" />
                  <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>
            
            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Forgot your password?
                </Link>
                
                
                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </div>
        </form>
    </div>
    </AuthenticationCard>
</template>
<style scoped>
.card{
    position: inherit;
    border-radius: 20px;
    align-self: center;
    width: 800px;
    height: 500px;
}

.login-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #2a3b47;
  background-image: url('/path-to-background-image.png'); /* Ruta a la imagen de fondo */
  background-size: cover;
  background-position: center;
}

.login-card {
  background-color: #222d35;
  padding: 20px 30px;
  border-radius: 8px;
  width: 100%;
  max-width: 100vh;
  text-align: center;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  color: white;
}

.login-card h2 {
  margin-bottom: 20px;
  color: #ffffff;
  font-size: 1.5rem;
}

.input-group {
  margin-bottom: 15px;
  text-align: left;
}

.input-group label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
  color: #ffffff;
}

.input-group input {
  width: 100%;
  padding: 10px;
  border-radius: 4px;
  border: 1px solid #ccc;
  outline: none;
  font-size: 1rem;
  background-color: #2a3b47;
  color: #fff;
}

.input-group input::placeholder {
  color: #999;
}

.btn-primary {
  background-color: #2b85e4;
  color: #fff;
  border: none;
  padding: 10px 20px;
  font-size: 1rem;
  border-radius: 4px;
  cursor: pointer;
  width: 100%;
}

.btn-primary:hover {
  background-color: #2677c6;
}

.links, .support {
  margin-top: 15px;
  font-size: 0.9rem;
}

.links p, .support p {
  color: #ffffff;
}

.links a {
  color: #5cdb5c;
  text-decoration: none;
}

.support a {
  color: #e74c3c;
  text-decoration: none;
}
.aut{
    background-color: #2a3b47;
}
</style>