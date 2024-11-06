<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    rut: '',
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>

    <Head title="Register" />
    <AuthenticationCard class="flex flex-cols-2 w-full aut ">
        <div class="form-container w-full">
            <h2>Formulario Registro Sistemas de La Florida</h2>
            <p>El proceso de registro consta en 2 pasos:</p>
            <ol>
                <li>Primero es rellenar este formulario con la información solicitada</li>
                <li>
                    Enviando el formulario, se te hará llegar de forma automática un correo con un link de activación,
                    cuando ingreses
                    podrás recién establecer tu contraseña y tu cuenta quedará habilitada para entrar a nuestros
                    sistemas.
                </li>
            </ol>
            <form @submit.prevent="submit">
                <div class="form-group text-black">
                    <label>R.U.T.:</label>
                    <input type="text" placeholder="13.478.567-5" v-model="form.rut" required autofocus />
                </div>

                <div class="form-group text-black">
                    <label>*Nombres:</label>
                    <input type="text" placeholder="Nombres" v-model="form.name" required autofocus
                        autocomplete="name" />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="form-group text-black">
                    <label>Apellido Paterno:</label>
                    <input type="text" placeholder="Apellido Paterno" />
                </div>

                <div class="form-group text-black">
                    <label>Apellido Materno:</label>
                    <input type="text" placeholder="Apellido Materno" />
                </div>

                <div class="form-group text-black">
                    <label>*Email:</label>
                    <input type="email" placeholder="Email" />
                </div>

                <div class="form-group text-black">
                    <label>*Confirmar Email:</label>
                    <input type="email" placeholder="Confirmar Email" />
                </div>

                <div class="form-group text-black">
                    <label>Teléfono:</label>
                    <input type="tel" placeholder="Teléfono" />
                </div>

                <div class="form-group text-black">
                    <label>*Fecha de Nacimiento:</label>
                    <input type="date" />
                </div>

                <div class="form-group text-black">
                    <label>Estado Civil:</label>
                    <select>
                        <option value="">-- Seleccione --</option>
                        <option value="soltero">Soltero</option>
                        <option value="casado">Casado</option>
                        <option value="viudo">Viudo</option>
                    </select>
                </div>

                <div class="form-group text-black">
                    <label>*Sexo:</label>
                    <select>
                        <option value="">-- Seleccione --</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                </div>

                <div class="form-group text-black">
                    <label>País de origen:</label>
                    <input type="text" placeholder="Chile" />
                </div>

                <div class="form-group text-black">
                    <label>Profesión:</label>
                    <input type="text" placeholder="Profesión" />
                </div>
                <hr>
                <div class="form-group text-black">
                    <label>Region :</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <select
                            class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <!--<option value="0">--Seleccione--</option>
                            <option value="2">ANTOFAGASTA</option>
                            <option value="15">ARICA Y PARINACOTA</option>
                            <option value="3">ATACAMA</option>
                            <option value="11">AYSEN DEL GENERAL CARLOS IBANEZ DEL CAMPO</option>
                            <option value="8">BIOBIO</option>
                            <option value="4">COQUIMBO</option>
                            <option value="9">LA ARAUCANIA</option>
                            <option value="6">LIBERTADOR GENERAL BERNARDO O HIGGINS</option>
                            <option value="10">LOS LAGOS</option>
                            <option value="14">LOS RIOS</option>
                            <option value="12">MAGALLANES Y DE LA ANTARTICA CHILENA</option>
                            <option value="7">MAULE</option>-->
                            <option value="13">METROPOLITANA DE SANTIAGO</option>
                            <!--<option value="1">TARAPACA</option>
                            <option value="5">VALPARAISO</option>-->
                        </select>

                    </div>
                </div>
                <div class="form-group text-black">
                    <label>Comuna:</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <select
                            class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <!--<option value="">Seleccione Comuna</option>
                            <option value="13101">SANTIAGO</option>
                            <option value="13102">CERRILLOS</option>
                            <option value="13103">CERRO NAVIA</option>
                            <option value="13104">CONCHALÍ</option>
                            <option value="13105">EL BOSQUE</option>
                            <option value="13106">ESTACIÓN CENTRAL</option>
                            <option value="13107">HUECHURABA</option>
                            <option value="13108">INDEPENDENCIA</option>
                            <option value="13109">LA CISTERNA</option>-->
                            <option value="13110">LA FLORIDA</option>
                            <!--<option value="13111">LA GRANJA</option>
                            <option value="13112">LA PINTANA</option>
                            <option value="13113">LA REINA</option>
                            <option value="13114">LAS CONDES</option>
                            <option value="13115">LO BARNECHEA</option>
                            <option value="13116">LO ESPEJO</option>
                            <option value="13117">LO PRADO</option>
                            <option value="13118">MACUL</option>
                            <option value="13119">MAIPÚ</option>
                            <option value="13120">ÑUÑOA</option>
                            <option value="13121">PEDRO AGUIRRE CERDA</option>
                            <option value="13122">PEÑALOLEN</option>
                            <option value="13123">PROVIDENCIA</option>
                            <option value="13124">PUDAHUEL</option>
                            <option value="13125">QUILICURA</option>
                            <option value="13126">QUINTA NORMAL</option>
                            <option value="13127">RECOLETA</option>
                            <option value="13128">RENCA</option>
                            <option value="13129">SAN JOAQUÍN</option>
                            <option value="13130">SAN MIGUEL</option>
                            <option value="13131">SAN RAMÓN</option>
                            <option value="13132">VITACURA</option>
                            <option value="13201">PUENTE ALTO</option>
                            <option value="13202">PIRQUE</option>
                            <option value="13203">SAN JOSÉ DE MAIPO</option>
                            <option value="13301">COLINA</option>
                            <option value="13302">LAMPA</option>
                            <option value="13303">TILTIL</option>
                            <option value="13401">SAN BERNARDO</option>
                            <option value="13402">BUIN</option>
                            <option value="13403">CALERA DE TANGO</option>
                            <option value="13404">PAINE</option>
                            <option value="13501">MELIPILLA</option>
                            <option value="13502">ALHUÉ</option>
                            <option value="13503">CURACAVÍ</option>
                            <option value="13504">MARÍA PINTO</option>
                            <option value="13505">SAN PEDRO</option>
                            <option value="13601">TALAGANTE</option>
                            <option value="13602">EL MONTE</option>
                            <option value="13603">ISLA DE MAIPO</option>
                            <option value="13604">PADRE HURTADO</option>
                            <option value="13605">PEÑAFLOR</option>-->
                        </select>
                    </div>
                </div>
                <div class="form-group text-black ">
                    <label class="mr-2">Calle:</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <input type="text" placeholder="Dirección"
                            class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                </div>
                <div class="form-group text-black ">
                    <label class="mr-2">Numero:</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11 4a1 1 0 0 0-1 1v10h10.459l.522-3H16a1 1 0 1 1 0-2h5.33l.174-1H16a1 1 0 1 1 0-2h5.852l.117-.67v-.003A1.983 1.983 0 0 0 20.06 4H11ZM9 18c0-.35.06-.687.17-1h11.66c.11.313.17.65.17 1v1a1 1 0 0 1-1 1H10a1 1 0 0 1-1-1v-1Zm-6.991-7a17.8 17.8 0 0 0 .953 6.1c.198.54 1.61.9 2.237.9h1.34c.17 0 .339-.032.495-.095a1.24 1.24 0 0 0 .41-.27c.114-.114.2-.25.254-.396a1.01 1.01 0 0 0 .055-.456l-.242-2.185a1.073 1.073 0 0 0-.395-.71 1.292 1.292 0 0 0-.819-.286H5.291c-.12-.863-.17-1.732-.145-2.602-.024-.87.024-1.74.145-2.602H6.54c.302 0 .594-.102.818-.286a1.07 1.07 0 0 0 .396-.71l.24-2.185a1.01 1.01 0 0 0-.054-.456 1.088 1.088 0 0 0-.254-.397 1.223 1.223 0 0 0-.41-.269A1.328 1.328 0 0 0 6.78 4H4.307c-.3-.001-.592.082-.838.238a1.335 1.335 0 0 0-.531.634A17.127 17.127 0 0 0 2.008 11Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <input type="text" placeholder="Numero"
                            class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                </div>
                <div class="form-group text-black ">
                    <label class="mr-2">Block o Torre :</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11 4a1 1 0 0 0-1 1v10h10.459l.522-3H16a1 1 0 1 1 0-2h5.33l.174-1H16a1 1 0 1 1 0-2h5.852l.117-.67v-.003A1.983 1.983 0 0 0 20.06 4H11ZM9 18c0-.35.06-.687.17-1h11.66c.11.313.17.65.17 1v1a1 1 0 0 1-1 1H10a1 1 0 0 1-1-1v-1Zm-6.991-7a17.8 17.8 0 0 0 .953 6.1c.198.54 1.61.9 2.237.9h1.34c.17 0 .339-.032.495-.095a1.24 1.24 0 0 0 .41-.27c.114-.114.2-.25.254-.396a1.01 1.01 0 0 0 .055-.456l-.242-2.185a1.073 1.073 0 0 0-.395-.71 1.292 1.292 0 0 0-.819-.286H5.291c-.12-.863-.17-1.732-.145-2.602-.024-.87.024-1.74.145-2.602H6.54c.302 0 .594-.102.818-.286a1.07 1.07 0 0 0 .396-.71l.24-2.185a1.01 1.01 0 0 0-.054-.456 1.088 1.088 0 0 0-.254-.397 1.223 1.223 0 0 0-.41-.269A1.328 1.328 0 0 0 6.78 4H4.307c-.3-.001-.592.082-.838.238a1.335 1.335 0 0 0-.531.634A17.127 17.127 0 0 0 2.008 11Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <input type="text" placeholder="Block o Torre"
                            class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                </div>
                <div class="form-group text-black ">
                    <label class="mr-2">Depto, casa o local :</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11 4a1 1 0 0 0-1 1v10h10.459l.522-3H16a1 1 0 1 1 0-2h5.33l.174-1H16a1 1 0 1 1 0-2h5.852l.117-.67v-.003A1.983 1.983 0 0 0 20.06 4H11ZM9 18c0-.35.06-.687.17-1h11.66c.11.313.17.65.17 1v1a1 1 0 0 1-1 1H10a1 1 0 0 1-1-1v-1Zm-6.991-7a17.8 17.8 0 0 0 .953 6.1c.198.54 1.61.9 2.237.9h1.34c.17 0 .339-.032.495-.095a1.24 1.24 0 0 0 .41-.27c.114-.114.2-.25.254-.396a1.01 1.01 0 0 0 .055-.456l-.242-2.185a1.073 1.073 0 0 0-.395-.71 1.292 1.292 0 0 0-.819-.286H5.291c-.12-.863-.17-1.732-.145-2.602-.024-.87.024-1.74.145-2.602H6.54c.302 0 .594-.102.818-.286a1.07 1.07 0 0 0 .396-.71l.24-2.185a1.01 1.01 0 0 0-.054-.456 1.088 1.088 0 0 0-.254-.397 1.223 1.223 0 0 0-.41-.269A1.328 1.328 0 0 0 6.78 4H4.307c-.3-.001-.592.082-.838.238a1.335 1.335 0 0 0-.531.634A17.127 17.127 0 0 0 2.008 11Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <input type="text" placeholder="Depto, casa o local"
                            class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                </div>
                <div class="form-group text-black ">
                    <label class="mr-2">Referencia:</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11 4a1 1 0 0 0-1 1v10h10.459l.522-3H16a1 1 0 1 1 0-2h5.33l.174-1H16a1 1 0 1 1 0-2h5.852l.117-.67v-.003A1.983 1.983 0 0 0 20.06 4H11ZM9 18c0-.35.06-.687.17-1h11.66c.11.313.17.65.17 1v1a1 1 0 0 1-1 1H10a1 1 0 0 1-1-1v-1Zm-6.991-7a17.8 17.8 0 0 0 .953 6.1c.198.54 1.61.9 2.237.9h1.34c.17 0 .339-.032.495-.095a1.24 1.24 0 0 0 .41-.27c.114-.114.2-.25.254-.396a1.01 1.01 0 0 0 .055-.456l-.242-2.185a1.073 1.073 0 0 0-.395-.71 1.292 1.292 0 0 0-.819-.286H5.291c-.12-.863-.17-1.732-.145-2.602-.024-.87.024-1.74.145-2.602H6.54c.302 0 .594-.102.818-.286a1.07 1.07 0 0 0 .396-.71l.24-2.185a1.01 1.01 0 0 0-.054-.456 1.088 1.088 0 0 0-.254-.397 1.223 1.223 0 0 0-.41-.269A1.328 1.328 0 0 0 6.78 4H4.307c-.3-.001-.592.082-.838.238a1.335 1.335 0 0 0-.531.634A17.127 17.127 0 0 0 2.008 11Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <input type="text" placeholder="Referencia Dirección"
                            class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                </div>
                <p><strong class="text-yellow-500">* Estos campos son obligatorios</strong></p>
                <PrimaryButton class=" bg-blue-600 hover:bg-blue-800 w-full ms-4"
                    :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Enviar Formulario
                    <svg class="w-[24px] h-[24px]  text-white-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </PrimaryButton>

            </form>
        </div>
    </AuthenticationCard>
</template>
<style scoped>
.aut {
    background-color: #28353b;
}

.form-container {
    width: 700px;
    margin: 0 auto;
    padding: 20px;
    background-color: #2f3e48;
    color: #ffffff;
    border-radius: 15px;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.2);

}

h2 {
    font-size: 1.5em;
    text-align: center;
    color: #ffdd57;
    margin-bottom: 10px;
}

p,
ol {
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
