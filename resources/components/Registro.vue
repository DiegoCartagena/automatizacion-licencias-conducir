<template>
    <div class="form-container">
      <h2>Formulario Registro Sistemas de La Florida</h2>
      <p>El proceso de registro consta en 2 pasos:</p>
      <ol>
        <li>Primero es rellenar este formulario con la información solicitada</li>
        <li>
          Enviando el formulario, se te hará llegar de forma automática un correo con un link de activación, cuando ingreses
          podrás recién establecer tu contraseña y tu cuenta quedará habilitada para entrar a nuestros sistemas.
        </li>
      </ol>
  
      <form @submit.prevent="submitForm">
        <div class="form-group">
          <label>R.U.T.:</label>
          <input type="text" placeholder="13.478.567-5" />
        </div>
  
        <div class="form-group">
          <label>*Nombres:</label>
          <input type="text" placeholder="Nombres" />
        </div>
  
        <div class="form-group">
          <label>Apellido Paterno:</label>
          <input type="text" placeholder="Apellido Paterno" />
        </div>
  
        <div class="form-group">
          <label>Apellido Materno:</label>
          <input type="text" placeholder="Apellido Materno" />
        </div>
  
        <div class="form-group">
          <label>*Email:</label>
          <input type="email" placeholder="Email" />
        </div>
  
        <div class="form-group">
          <label>*Confirmar Email:</label>
          <input type="email" placeholder="Confirmar Email" />
        </div>
  
        <div class="form-group">
          <label>Teléfono:</label>
          <input type="tel" placeholder="Teléfono" />
        </div>
  
        <div class="form-group">
          <label>*Fecha de Nacimiento:</label>
          <input type="date" />
        </div>
  
        <div class="form-group">
          <label>Estado Civil:</label>
          <select>
            <option value="">-- Seleccione --</option>
            <option value="soltero">Soltero</option>
            <option value="casado">Casado</option>
            <option value="viudo">Viudo</option>
          </select>
        </div>
  
        <div class="form-group">
          <label>*Sexo:</label>
          <select>
            <option value="">-- Seleccione --</option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
          </select>
        </div>
  
        <div class="form-group">
          <label>País de origen:</label>
          <input type="text" placeholder="Chile" />
        </div>
  
        <div class="form-group">
          <label>Profesión:</label>
          <input type="text" placeholder="Profesión" />
        </div>
  
        <button type="submit" class="submit-button">Enviar</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    name: 'RegisterForm',
    methods: {
      submitForm() {
        // Manejo de la lógica de envío del formulario
        alert('Formulario enviado');
      }
    }
  }
  </script>
  
  <style scoped>
  .form-container {
    width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #2f3e46;
    color: #ffffff;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
  }
  
  h2 {
    font-size: 1.5em;
    text-align: center;
    color: #ffdd57;
    margin-bottom: 10px;
  }
  
  p, ol {
    font-size: 0.9em;
    margin-bottom: 15px;
    line-height: 1.4;
  }
  
  .form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
  }
  
  .form-group label {
    font-size: 0.85em;
    margin-bottom: 5px;
    color: #ffffff;
  }
  
  .form-group input,
  .form-group select {
    padding: 10px;
    font-size: 0.9em;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
  }
  
  .form-group input::placeholder {
    color: #b0b0b0;
  }
  
  .submit-button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    font-size: 1em;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  
  .submit-button:hover {
    background-color: #0056b3;
  }
  </style>
  