<style scoped lang="css">
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
  max-width: 400px;
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
</style>

<template>
    <div class="login-container">
      <div class="login-card">
        <h2>Inicio de Sesión</h2>
        <form @submit.prevent="submitForm">
          <div class="input-group">
            <label for="rut">R.U.T.:</label>
            <input type="text" id="rut" placeholder="R.U.T." v-model="rut" />
          </div>
          <div class="input-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" placeholder="Contraseña" v-model="password" />
          </div>
          <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
        <div class="links">
          <p>¿Aún no estás registrado? <a href="#">Regístrate aquí</a></p>
          <p>¿Olvidaste tu contraseña? <a href="#">Haz click aquí</a></p>
        </div>
        <div class="support">
          <p>¿Aún tienes problemas con tu registro u otro sistema? Envía un correo a <a href="mailto:registro@laflorida.cl">registro@laflorida.cl</a></p>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const rut = ref('');
  const password = ref('');
  
  function submitForm() {
    // Lógica de inicio de sesión
    console.log('RUT:', rut.value);
    console.log('Contraseña:', password.value);
  }
 
  </script>
  