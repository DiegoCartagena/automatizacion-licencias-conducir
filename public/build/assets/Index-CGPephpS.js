import{A as x}from"./AppLayout-CnokBy6r.js";import{d as a,T as f,c as v,w as m,o as r,a as o,e as s,h as i,F as d,t as n,f as k,I as w}from"./app-Qpi9dm6T.js";import"./index-DzQnsCzH.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";/* empty css                                                                  */const R={class:"bg-grey-800 p-6"},C={class:"grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"},D=["onClick"],E={class:"text-lg font-semibold text-yellow-300 mb-2"},z={class:"text-sm text-gray-300"},A={key:0,class:"mt-8 bg-gray-300 p-6 rounded-lg opacity-80"},B={class:"text-white-300 text-xl font-bold mb-4"},L={class:"table-auto w-full bg-gray-300 rounded-lg"},N={class:"bg-gray-700"},I={__name:"Index",setup(O){a(!1),a(!1),a({}),f({rut:"",name:"",aPaterno:"",aMaterno:"",email:"",sexo:"",telefono:"",estadoCivil:"",fechaNacimiento:"",nacionalidad:"",password:"",password_confirmation:"",profesion:""}),a("");const h=a([{nombre:"Aprobados/Rechazados",descripcion:"Reporte de trámites aprobados y rechazados"},{nombre:"Licencias Emitidas",descripcion:"Reporte de licencias emitidas"},{nombre:"Solicitudes",descripcion:"Reporte de solicitudes registradas"},{nombre:"Pagos",descripcion:"Reporte de pagos realizados"},{nombre:"Reporte Otro 1",descripcion:"Descripción del reporte personalizado"},{nombre:"Reporte Otro 2",descripcion:"Descripción del reporte personalizado"}]),l=a(null),b=a([]),g=a([]),y=async c=>{l.value=c;try{const t=[];b.value=t.headers||["id","Usuario","Estado"],g.value=t.datos||[["1","Diego","Aprobado"]]}catch(t){console.error("Error al cargar el reporte:",t),alert("No se pudieron cargar los datos del reporte.")}},_=async()=>{try{const c=await w.post("/api/reportes/descargar",{tipo:l.value.nombre},{responseType:"blob"}),t=window.URL.createObjectURL(new Blob([c.data])),e=document.createElement("a");e.href=t,e.setAttribute("download",`${l.value.nombre}.xlsx`),document.body.appendChild(e),e.click()}catch(c){console.error("Error al descargar el reporte:",c),alert("No se pudo descargar el reporte.")}};return(c,t)=>(r(),v(x,{class:"bg-gray-100"},{header:m(()=>t[0]||(t[0]=[o("h1",{class:"font-bold text-black-300"},"Reportes",-1)])),default:m(()=>[o("div",R,[o("div",C,[(r(!0),s(d,null,i(h.value,(e,p)=>(r(),s("div",{key:p,class:"bg-gray-700 rounded-lg shadow-md p-4 text-center hover:bg-green-500 cursor-pointer",onClick:u=>y(e)},[o("h2",E,n(e.nombre),1),o("p",z,n(e.descripcion),1)],8,D))),128))]),l.value?(r(),s("div",A,[o("h2",B,"Vista Previa: "+n(l.value.nombre),1),o("table",L,[o("thead",N,[o("tr",null,[(r(!0),s(d,null,i(b.value,e=>(r(),s("th",{key:e,class:"p-2 text-left text-yellow-300"},n(e),1))),128))])]),o("tbody",null,[(r(!0),s(d,null,i(g.value,(e,p)=>(r(),s("tr",{key:p,class:""},[(r(!0),s(d,null,i(e,u=>(r(),s("td",{key:u,class:"p-2 text-black-300"},n(u),1))),128))]))),128))])]),o("div",{class:"text-right mt-4"},[o("button",{onClick:_,class:"bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"}," Descargar Reporte ")])])):k("",!0)])]),_:1}))}};export{I as default};