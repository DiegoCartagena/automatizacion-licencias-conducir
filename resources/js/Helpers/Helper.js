import { Inertia } from "@inertiajs/inertia";
import {reactive, ref ,watch} from "vue";

const solicitud = reactive({value:{}});

export default function helper(){
const crearSolicitud = async (data)=>{
    const res = await axios.post('/api/create-solicitud',data);
    if(res.data.res){
      solicitud.value= res.data.data;
      var conf  = confirm('solicitud creada con exito se rediregira a la siguiente pagina')
      if(conf){
        window.location.href = ('/Calendar');
      }
    }else{
      alert('Ocurrio un error intenta nuevamente mas tarde');
    }
    }
    return 
    {
        solicitud,
        crearSolicitud

    }
}