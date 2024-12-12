import{A as _}from"./AppLayout-CnokBy6r.js";import{Q as u,d as g,q as y,c as x,w,o as c,a as e,e as m,h as C,u as k,F as D,t as d,n as E}from"./app-Qpi9dm6T.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";/* empty css                                                                  */const F={class:"min-h-screen bg-gray-800 text-white"},A={class:"max-w-5xl mx-auto py-6 bg-gray-700 p-6 rounded-lg"},I={class:"table-auto w-full border border-gray-300 bg-gray-800 rounded-lg"},S={class:"p-2"},B={class:"p-2"},N={class:"p-2"},L={class:"flex items-center justify-center gap-2"},P=["onChange","disabled"],j=["onClick","disabled"],T={__name:"CargaDocumentos",setup(q){const{props:h}=u(),p=u(),l=g({}),n=g(0),r=h.files,b=s=>{document.querySelectorAll('input[type="file"]')[s].click()},f=async(s,a)=>{const o=s.target.files[0];if(console.log(o),o){const t=new FormData;t.append("archivo",o),t.append("estado",r[a].estado),t.append("id_solicitud",n.value),t.append("usuario_actualizacion",p.props.auth.user.id),t.append("usuario_creacion",p.props.auth.user.id),t.append("nombre",r[a].Nombre),t.append("tipo",o.name.split(".").pop().toLowerCase());try{const i=await axios.post("/api/create-documento",t,{headers:{"Content-Type":"multipart/form-data"}});r[a].estado="En Proceso",console.log("Archivo enviado exitosamente:",i.data)}catch(i){console.error("Error al enviar el archivo:",i),r[a].estado="Error al enviar"}}},v=async()=>{try{const s=new FormData;r.forEach(t=>{t.archivo&&s.append(t.nombre,t.archivo)}),r.forEach(t=>{t.archivo&&(t.estado="enviado")}),alert("Documentos enviados correctamente ahora seras redirigido a el proceso de pago del tramite"),n.value=localStorage.getItem("id_solicitud");const a=await axios.post("/api/edit-solicitud",{id:n,step:"Pago"});console.log(l.value);const o=await axios.post("/api/start_pago",{id_solicitud:n,solicitud:l.value});console.log(o),window.location.href=o.data}catch(s){console.error("Error al cargar los documentos:",s),alert("No se pudo cargar los documentos. Intenta de nuevo.")}};return y(async()=>{n.value=localStorage.getItem("id_solicitud");const s=await axios.post("/api/edit-solicitud",{id:n.value,step:"Carga documentos"});s.data.res&&(l.value=s.data.solicitud)}),(s,a)=>(c(),x(_,null,{default:w(()=>[e("div",F,[a[2]||(a[2]=e("header",{class:"bg-gray-900 py-4 px-8 flex justify-between items-center"},[e("div",{class:"text-xl font-bold text-yellow-300"},"Carga de Documentos")],-1)),e("main",A,[a[1]||(a[1]=e("h2",{class:"text-lg font-semibold mb-4"},"Sube los documentos necesarios",-1)),e("table",I,[a[0]||(a[0]=e("thead",{class:"bg-gray-900"},[e("tr",{class:"text-center"},[e("th",{class:"p-2"},"Documento"),e("th",{class:"p-2"},"Estado"),e("th",{class:"p-2"},"Acción")])],-1)),e("tbody",null,[(c(!0),m(D,null,C(k(r),(o,t)=>(c(),m("tr",{key:o.id,class:"text-center"},[e("td",S,d(o.Nombre),1),e("td",B,[e("span",{class:E({"text-yellow-300":o.estado==="pendiente","text-blue-300":o.estado==="En Proceso","text-green-500":o.estado==="enviado"})},d(o.estado),3)]),e("td",N,[e("div",L,[e("input",{ref_for:!0,ref:"fileInput",type:"file",onChange:i=>f(i,t),class:"hidden",disabled:o.estado==="Completado"},null,40,P),e("button",{onClick:i=>b(t),class:"bg-green-500 text-black py-1 px-4 rounded hover:bg-green-600",disabled:o.estado==="enviado"},d(o.estado==="enviado"?"Cargado":"Cargar"),9,j)])])]))),128))])]),e("div",{class:"text-center mt-6"},[e("button",{onClick:v,class:"bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"}," Guardar y Continuar ")])])])]),_:1}))}};export{T as default};