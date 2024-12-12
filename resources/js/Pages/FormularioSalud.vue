<template>
    <AppLayout>
        <div class="min-h-screen bg-gray-800 text-white">
            <!-- Encabezado -->
            <header class="bg-gray-900 py-4 px-8 flex justify-between items-center">
                <div class="text-xl font-bold text-yellow-300">
                    Formulario de Declaración de Salud
                    <br>
                    <p class="text-xl font-smile  text-red-500">Se solicita que responda las siguientes preguntas
                        referidas a su estado de salud. Sus respuestas serán tratadas en forma confidencial, de manera
                        que puede contestar con sinceridad.
                        Si usted presenta problemas de salud, ello no es causa para impedir la obtención o renovación de
                        su licencia de conducir, mientras tome los cuidados necesarios para efectuar una conducción
                        segura.
                        El espíritu de estas medidas es resguardar su propia seguridad y salud, como las de todas las
                        personas que comparten el espacio público.
                    </p>
                </div>
            </header>

            <!-- Contenedor del formulario -->
            <main class="max-w-7xl mx-auto py-6 bg-gray-700 p-6 rounded-lg">
                <h2 class="text-lg font-semibold mb-4">Complete el siguiente formulario</h2>

                <form @submit.prevent="handleSubmit" class="space-y-6">
                    <!-- Declaración -->
                    <fieldset class="border border-gray-600 p-4 rounded-lg">
                        <legend class="text-yellow-300">Declaración</legend>
                        <p class="text-base mb-4">
                            Yo,   <input v-model="nombreCompleto" type="text" placeholder="Nombre completo"
                                class="bg-gray-800 ml-2 mr-2 text-base text-white p-2 rounded w-64" required />,
                            RUN N° <input v-model="page.props.auth.user.rut" type="text" placeholder="12345678-9"
                                class="bg-gray-800 text-base text-white p-2 rounded w-32 ml-2 mr-2" required />,  estoy en conocimiento de
                            que mi estado de salud puede incidir, en favor o en detrimento, de la seguridad vial, al
                            momento de conducir un vehículo. Por ello declaro no faltar a la verdad ni ocultar
                            información con respecto a la existencia, actual o pasada, de enfermedades físicas,
                            enfermedades psíquicas, intervenciones o tratamientos médicos, a los que haya sido
                            sometido(a).
                        </p>
                    </fieldset>

                    <!-- Datos personales -->
                    <fieldset class="border border-gray-600 p-4 rounded-lg">
                        <legend class="text-yellow-300">Datos Personales</legend>
                        <div class="grid grid-cols-2 gap-4">
                            <input v-model="nombreCompleto" type="text" placeholder="Nombre"
                                class="bg-gray-800 text-white p-2 rounded" required />
                            <input v-model="formData.edad" type="number" placeholder="Edad"
                                class="bg-gray-800 text-white p-2 rounded" required />
                            <select v-model="formData.sexo" class="bg-gray-800 text-white p-2 rounded" required>
                                <option value="" disabled>Seleccione Sexo</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                            </select>
                            <input v-model="formData.peso" type="number" placeholder="Peso (kg)"
                                class="bg-gray-800 text-white p-2 rounded" required />
                            <input v-model="formData.estatura" type="number" placeholder="Estatura (cm)"
                                class="bg-gray-800 text-white p-2 rounded" required />
                        </div>
                    </fieldset>

                    <!-- Licencias -->
                    <fieldset class="border border-gray-600 p-4 rounded-lg">
                        <legend class="text-yellow-300">Licencia de Conductor que posee</legend>
                        <legend class="text-white-300 font-bold">Profesional</legend>
                        <div class="grid grid-cols-5 gap-2">
                            <label><input v-model="formData.licencias.a1" type="checkbox" /> A-1</label>
                            <label><input v-model="formData.licencias.a2" type="checkbox" /> A-2</label>
                            <label><input v-model="formData.licencias.a3" type="checkbox" /> A-3</label>
                            <label><input v-model="formData.licencias.a4" type="checkbox" /> A-4</label>
                            <label><input v-model="formData.licencias.a5" type="checkbox" /> A-5</label>
                            <!-- Agregar más licencias según sea necesario -->
                        </div>
                        <legend class="text-white-300 font-bold">No profesional</legend>
                        <div class="grid grid-cols-5 gap-2">
                            <label><input v-model="formData.licencias.b" type="checkbox" /> B</label>
                            <label><input v-model="formData.licencias.c" type="checkbox" /> C</label>
                            <!-- Agregar más licencias según sea necesario -->
                        </div>
                        <legend class="text-white-300 font-bold">Especiales</legend>
                        <div class="grid grid-cols-5 gap-2">
                            <label><input v-model="formData.licencias.d" type="checkbox" /> D</label>
                            <label><input v-model="formData.licencias.e" type="checkbox" /> E</label>
                            <label><input v-model="formData.licencias.f" type="checkbox" /> F</label>

                        </div>
                        <legend class="text-white-300 font-bold">Obtenidas antes del 08 de Marzo de 1997</legend>
                        <div class="grid grid-cols-5 gap-2">
                            <label><input v-model="formData.licencias.aa1" type="checkbox" /> A-1</label>
                            <label><input v-model="formData.licencias.aa2" type="checkbox" /> A-2</label>

                        </div>
                    </fieldset>
                    <!--datos Academicos -->
                    <fieldset class="border border-gray-600 p-4 rounded-lg">
                        <legend class="text-yellow-300">Estudios</legend>
                        <div class="grid grid-cols-5 gap-4">
                            <label><input v-model="formData.academicos.basica_incompleta" type="checkbox" /> E. Básica
                                incompleta</label>
                            <label><input v-model="formData.academicos.basica_completa" type="checkbox" /> E. Básica completa</label>
                            <label><input v-model="formData.academicos.media_incompleta" type="checkbox" /> E. Media incompleta</label>
                            <label><input v-model="formData.academicos.media_completa" type="checkbox" /> E. Media completa</label>
                            <label><input v-model="formData.academicos.superior" type="checkbox" /> E. Superior</label>
                        </div>
                    </fieldset>
                    <fieldset class="border border-gray-600 p-4 rounded-lg">
                        <legend class="text-yellow-300">Situación laboral</legend>
                        <div class="grid grid-cols-6 gap-4">
                            <label><input v-model="formData.laboral.activo" type="checkbox" /> Activo(a) </label>
                            <label><input v-model="formData.laboral.desempleado" type="checkbox" /> Desempleado</label>
                            <label><input v-model="formData.laboral.jubilado" type="checkbox" /> Jubilado(a) </label>
                            <label><input v-model="formData.laboral.pensionado" type="checkbox" /> Pensionado(a)
                            </label>
                            <label><input v-model="formData.laboral.estudiante" type="checkbox" /> Estudiante</label>
                            <label><input v-model="formData.laboral.labores_casa" type="checkbox" /> Labores de
                                casa</label>
                        </div>
                    </fieldset>
                    <label>Oficio / Profesión <input type="text" class="w-full text-black rounded-lg font-bold"
                            v-model="page.props.auth.user.profesion" /></label>
                    <fieldset class="border border-gray-600 p-4 rounded-lg">
                        <legend class="text-yellow-300">Jornada laboral</legend>
                        <div class="grid grid-cols-3 gap-4">
                            <label><input type="checkbox" v-model="formData.jornada_laboral.diurna"> Diurna</label>
                            <label><input type="checkbox" v-model="formData.jornada_laboral.turno"> Turno</label>
                        </div>
                        <div class="grid grid-cols-3 gap-4" v-if="formData.jornada_laboral.turno">
                            <label> ¿Cual? </label>
                            <label><input v-model="formData.jornada_laboral.fijo" type="checkbox"> Fijo</label>
                            <label><input v-model="formData.jornada_laboral.rotativo" type="checkbox"> Rotativo</label>
                        </div>

                    </fieldset>
                    <!-- Antecedentes -->
                    <fieldset class="border border-gray-600 p-4 rounded-lg">
                        <legend class="text-yellow-300">Antecedentes y Situación Actual</legend>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">Válvula cardíaca </span>
                                <input v-model="formData.antecedentes.valvulaCardiaca" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.valvulaCardiaca" type="radio" value="no" /> No
                            </label>
                            <label><span class="ml-2">By-pass coronario </span>
                                <input v-model="formData.antecedentes.bypass" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.bypass" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">Implante marcapasos </span>
                                <input v-model="formData.antecedentes.marcapasos" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.marcapasos" type="radio" value="no" /> No
                            </label>
                            <label><span class="ml-2">Cataratas </span>
                                <input v-model="formData.antecedentes.cataratas" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.cataratas" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">Glaucoma </span>
                                <input v-model="formData.antecedentes.glaucoma" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.glaucoma" type="radio" value="no" /> No
                            </label>
                            <label><span class="ml-2">Enfermedad de la retina o mácula </span>
                                <input v-model="formData.antecedentes.retina_macula" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.retina_macula" type="radio" value="no" /> No
                                <label class="grid grid-cols 1" v-if="formData.antecedentes.retina_macula == 'si'">¿Cual
                                    ojo?<input type="text"></label>
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">Operaciones de los ojos </span>
                                <input v-model="formData.antecedentes.operacion_ojos" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.operacion_ojos" type="radio" value="no" /> No
                                <label class="grid grid-cols 1" v-if="formData.antecedentes.operacion_ojos == 'si'">¿Cual
                                    ojo?<input type="text"></label>
                            </label>
                            <label><span class="ml-2">¿Usa lentes de cerca? </span>
                                <input v-model="formData.antecedentes.lentes_cerca" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.lentes_cerca" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">¿Usa lentes de lejos? </span>
                                <input v-model="formData.antecedentes.lentes_lejos" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.lentes_lejos" type="radio" value="no" /> No
                            </label>
                            <label><span class="ml-2">Enfermedades u operaciones de los oídos </span>
                                <input v-model="formData.antecedentes.operacion_ojos" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.operacion_ojos" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">Mareos, vértido o problemas de equilibrio </span>
                                <input v-model="formData.antecedentes.m_v_e" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.m_v_e" type="radio" value="no" /> No
                            </label>
                            <label><span class="ml-2">¿ Usa audifonos para escuchar mejor? </span>
                                <input v-model="formData.antecedentes.audifonos" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.audifonos" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">Desmayo o pérdida de conciencia </span>
                                <input v-model="formData.antecedentes.d_pc" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.d_pc" type="radio" value="no" /> No
                            </label>
                            <label><span class="ml-2">Epilepsia o crisis convulsivas </span>
                                <input v-model="formData.antecedentes.e_cc" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.e_cc" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">Pérdida de fuerza en extremidades </span>
                                <input v-model="formData.antecedentes.perdida_fuerza" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.perdida_fuerza" type="radio" value="no" /> No
                            </label>
                            <label><span class="ml-2">Escleorosis Múltiple </span>
                                <input v-model="formData.antecedentes.escleorosis" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.escleorosis" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">Enfermedad de Parkinson </span>
                                <input v-model="formData.antecedentes.parkinson" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.parkinson" type="radio" value="no" /> No
                            </label>
                            <label><span class="ml-2">TEC ( traumatismo encéfalo craneano ) </span>
                                <input v-model="formData.antecedentes.tec" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.tec" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">Pérdida , ausencia o malformación de una extremidad o parte de
                                    ella </span>
                                <input v-model="formData.antecedentes.p_a_m_extremidad" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.p_a_m_extremidad" type="radio" value="no" /> No
                            </label>
                            <label><span class="ml-2">Dificultad para hablar o escribir </span>
                                <input v-model="formData.antecedentes.dificultad_h_e" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.dificultad_h_e" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">Hipertension arterial </span>
                                <input v-model="formData.antecedentes.hipertension" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.hipertension" type="radio" value="no" /> No
                            </label>
                            <label><span class="ml-2">¿ Se siente a menudo cansado, fatigado o con sueño durante el día?
                                </span>
                                <input v-model="formData.antecedentes.c_f_s" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.c_f_s" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">Diabetes </span>
                                <input v-model="formData.antecedentes.diabetes" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.diabetes" type="radio" value="no" /> No
                            </label>
                            <label><span class="ml-2">Dificultad para respirar </span>
                                <input v-model="formData.antecedentes.dificultad_respirar" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.dificultad_respirar" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">Palpitaciónes </span>
                                <input v-model="formData.antecedentes.palpitaciones" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.palpitaciones" type="radio" value="no" /> No
                            </label>
                            <label><span class="ml-2">Dolor en el pecho al hacer esfuerzos </span>
                                <input v-model="formData.antecedentes.dolor_pecho" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.dolor_pecho" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">Enfermedad renal </span>
                                <input v-model="formData.antecedentes.enf_renal" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.enf_renal" type="radio" value="no" /> No
                            </label>
                            <label><span class="ml-2">Olvidos frecuentes qye llamen la atención </span>
                                <input v-model="formData.antecedentes.enf_renal" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.enf_renal" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">Problemas psicológicos o emocionales </span>
                                <input v-model="formData.antecedentes.problemas_psicolo_emo" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.problemas_psicolo_emo" type="radio" value="no" /> No
                            </label>
                            <label><span class="ml-2">Trastornos psiquiátricos </span>
                                <input v-model="formData.antecedentes.trastorno_psiquiatrico" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.trastorno_psiquiatrico" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">Cáncer </span>
                                <input v-model="formData.antecedentes.cancer" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.cancer" type="radio" value="no" /> No
                                <label v-if="formData.antecedentes.cancer == 'sí'">¿Cual? <input type="text" /></label>
                            </label>
                            <label><span class="ml-2">Enfermedad del hígado </span>
                                <input v-model="formData.antecedentes.enfermedad_higado" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.enfermedad_higado" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">Accidente cerebro vascular o derrame cerebral </span>
                                <input v-model="formData.antecedentes.acv" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.acv" type="radio" value="no" /> No
                            </label>
                            <label><span class="ml-2">Problemas para dormir </span>
                                <input v-model="formData.antecedentes.problemas_dormir" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.problemas_dormir" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">¿Usted ronca? (Mas fuerte que hablar o se escucha en piezas
                                    vecinas) </span>
                                <input v-model="formData.antecedentes.ronca" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.ronca" type="radio" value="no" /> No
                            </label>
                            <label><span class="ml-2">¿Alguien ha visto que pare de respirar cuando duerme? </span>
                                <input v-model="formData.antecedentes.parar_de_respirar" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.parar_de_respirar" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <legend class="text-yellow-300">Enfermedades del corazón</legend>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">Insuficiencia cardíaca </span>
                                <input v-model="formData.antecedentes.i_cardiaca" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.i_cardiaca" type="radio" value="no" /> No
                            </label>
                            <label><span class="ml-2">Infartos </span>
                                <input v-model="formData.antecedentes.infarto" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.infarto" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">Anginas de pecho </span>
                                <input v-model="formData.antecedentes.anginas" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.anginas" type="radio" value="no" /> No
                            </label>
                            <label><span class="ml-2">Arritmias </span>
                                <input v-model="formData.antecedentes.arritmia" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.arritmia" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">¿Operado de algo? </span>
                                <input v-model="formData.antecedentes.operado" type="radio" value="sí" /> Sí
                                <input v-model="formData.antecedentes.operado" type="radio" value="no" /> No
                                <label v-if="formData.antecedentes.operado == 'sí'">¿De qué? <input type="text"></label>
                            </label>
                            <label><span class="ml-2">¿Otra enfermedad ? </span>
                                <input v-model="formData.antecedentes.otra_enf" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.otra_enf" type="radio" value="no" /> No
                                <label v-if="formData.antecedentes.otra_enf == 'si'">¿Cuál? <input type="text"
                                        class="text-black"></label>
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-2 gap-4">
                            <label><span class="ml-2">¿Ha estado con licencia médica más de un mes en el último año?
                                </span>
                                <input v-model="formData.antecedentes.licencia_mas_mes" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.licencia_mas_mes" type="radio" value="no" /> No
                                <label v-if="formData.antecedentes.licencia_mas_mes == 'si'">¿Por qué? <input type="text"
                                        class="text-black"></label>

                            </label>
                            <label><span class="ml-2"> ¿Ha tomado o usado algún medicamento en último mes? </span>
                                <input v-model="formData.antecedentes.medicamento" type="radio" value="si" /> Sí
                                <input v-model="formData.antecedentes.medicamento" type="radio" value="no" /> No
                            </label>
                        </div>
                        <br>
                        <div class="grid grid-cols-1 gap-4">
                            <table class="table-auto w-full border border-gray-300">
                                <thead class="bg-gray-800 text-white">
                                    <tr class="text-center">
                                        <th class="p-2">Medicamento</th>
                                        <th class="p-2">Cantidad/día</th>
                                        <th class="p-2">¿Por qué?</th>
                                        <th class="p-2">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(medicamento, index) in medicamentos" :key="index" class="text-center">
                                        <td><input v-model="medicamento.nombre" type="text" placeholder="Medicamento"
                                                class="bg-gray-200 p-2 w-full rounded" /></td>
                                        <td><input v-model="medicamento.cantidad" type="text" placeholder="Cantidad/día"
                                                class="bg-gray-200 p-2 w-full rounded" /></td>
                                        <td><input v-model="medicamento.porque" type="text" placeholder="¿Por qué?"
                                                class="bg-gray-200 p-2 w-full rounded" /></td>
                                        <td>
                                            <button v-if="index === medicamentos.length - 1" @click="agregarMedicamento"
                                                class="text-green-500 hover:text-green-700 font-bold text-3xl">
                                                +
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                    <fieldset class="border border-gray-600 p-4 rounded-lg">
                        <legend class="text-yellow-300">Hábitos y antecedentes como conductor</legend>
                        <div class="grid grid-cols-1 gap-4">
                            <label><span class="ml-2">¿Conduce usted? </span>
                                <input v-model="formData.antecedentes.conduce" type="radio" value="todos" /> Todos los dias
                                <input v-model="formData.antecedentes.conduce" type="radio" value="algunos_semana" /> Algunos dias a la semana
                                <input v-model="formData.antecedentes.conduce" type="radio" value="todos" /> Algunos dias al mes
                                <input v-model="formData.antecedentes.conduce" type="radio" value="algunos_semana" /> Algunos dias al año
                            </label>
                        </div>
                        

                    </fieldset>

                    <!-- Botón de envío -->
                    <div class="text-center">
                        <button  type="submit" class="bg-yellow-300 text-black py-2 px-4 rounded hover:bg-yellow-400">
                            Enviar
                        </button>
                    </div>
                </form>
            </main>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { usePage } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
const nombreCompleto= ref('') ;
// Datos iniciales del formulario
const page = usePage();
const formData = ref({
    nombre: '',
    run: '',
    edad: null,
    sexo: '',
    peso: null,
    estatura: null,
    licencias: {
        a1: false,
        a2: false,
        b: false,
        c:false,
        a3:false,
        a4:false,
        a5:false,
        f:false,
        d:false,
        aa1:false,
        aa2:false,
        e:false,
    },
    academicos:{
        basica_incompleta:false,
        basica_completa:false,
        media_incompleta:false,
        media_completa:false,
        superior:false,
    },
    jornada_laboral: {
        diurna: false,
        turno: false,
        rotativo: false,
        fijo: false
    },
    laboral: {
        activo: false,
        desempleado: false,
        jubilado: false,
        pensionado: false,
        estudiante: false,
        labores_casa: false,
        oficio_profesion: '',

    },
    antecedentes: {
        valvulaCardiaca: '',
        retina_macula: '',
        cancer: '',
        operado: '',
        otra_enf: '',
        licencia_mas_mes: '',
        bypass:'',
        marcapasos:'',
        cataratas:'',
        glaucoma:'',
        operacion_ojos:'',
        lentes_cerca:'',
        lentes_lejos:'',
        enf_op_oido:'',
        m_v_e:'',
        audifonos:'',
        d_pc:'',
        e_cc:'',
        perdida_fuerza:'',
        escleorosis:'',
        parkinson:'',
        tec:'',
        p_a_m_extremidad:'',
        dificultad_h_e:'',
        hipertension:'',
        c_f_s:'',
        diabetes:'',
        dificultad_respirar:'',
        palpitaciones:'',
        dolor_pecho:'',
        enf_renal:'',
        olvidos_frec:'',
        problemas_psicolo_emo:'',
        trastorno_psiquiatrico:'',
        enfermedad_higado:'',
        problemas_dormir:'',
        ronca:'',
        parar_de_respirar:'',
        i_cardiaca:'',
        infarto:'',
        anginas:'',
        arritmia:'',
        medicamento:'',
        acv:'',
        conduce:''

    },
});
const medicamentos = ref([
    { nombre: '', cantidad: '', porque: '' }, // Primera fila por defecto
]);
// Agregar una nueva fila
const agregarMedicamento = () => {
    medicamentos.value.push({ nombre: '', cantidad: '', porque: '' });
};

// Manejo de envío del formulario
const handleSubmit = () => {
    window.location.href = ('/documentos');
        if (validateForm()) {
        alert('Formulario enviado con éxito');
        // Envío de datos a través de Axios
        // axios.post('/ruta-del-endpoint', formData.value)
        //   .then(response => console.log('Datos enviados:', response))
        //   .catch(error => console.error('Error al enviar:', error));
    } else {
        alert('Por favor complete todos los campos obligatorios.');
    }
};
const formatRut = (rut) => {
  // Eliminar puntos, guiones y espacios
  const cleanedRut = rut.replace(/[^0-9kK]/g, '').toUpperCase();

  // Separar el dígito verificador
  const cuerpo = cleanedRut.slice(0, -1);
  const verificador = cleanedRut.slice(-1);

  // Formatear con puntos y guión
  const formattedCuerpo = cuerpo.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

  return `${formattedCuerpo}-${verificador}`;
};

// Validación del formulario
const validateForm = () => {
    return (
        formData.value.nombre &&
        formData.value.run &&
        formData.value.edad &&
        formData.value.sexo &&
        formData.value.peso &&
        formData.value.estatura
    );
};
onMounted( async()=>{
    const id = localStorage.getItem('id_solicitud');
    nombreCompleto.value = page.props.auth.user.name+' '+page.props.auth.user.aPaterno+' '+page.props.auth.user.aMaterno;
   const step = await axios.post('/api/edit-solicitud',{id:id,step:'formulario de salud'});
   page.props.auth.user.rut=formatRut(page.props.auth.user.rut);
    if(step.data.res){
        page.props.solicitud=step.data.solicitud;
        console.log(page.props);
    }
})
</script>