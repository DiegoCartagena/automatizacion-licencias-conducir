import{Q as c,q as w,e as i,a as o,u as s,f as p,n as h,t as l,g as d,o as r}from"./app-Qpi9dm6T.js";/* empty css                                                                  */const _={class:"min-h-screen bg-gray-800 text-white"},P={class:"max-w-5xl mx-auto py-6 bg-gray-700 p-6 rounded-lg"},v={key:0,class:"flex justify-center mb-6"},z={key:1,class:"flex justify-center mb-6"},k={class:"bg-gray-800 p-4 rounded-lg shadow-md"},R={class:"mb-2"},D={class:"mb-2"},S={class:"mb-2"},A={class:"mb-2"},C={key:0,class:"mb-2 text-red-500"},B={__name:"PagoAprobado",setup(N){const{props:u}=c(),a=u.pago||{id:0,monto:0,fecha:"",estado:"",razon:""},e=a.status,g=c(),m=()=>{e===2?(alert("Redirigiendo al siguiente paso del proceso..."),window.location.href="/finalizado"):alert("Redirigiendo al inicio del proceso...")},x=n=>{const t=new Date(n),b=String(t.getDate()).padStart(2,"0"),f=String(t.getMonth()+1).padStart(2,"0"),y=t.getFullYear();return`${parseInt(b)}/${f}/${y}`};return w(async()=>{const n=localStorage.getItem("id_solicitud");if(e==2){const t=await axios.post("/api/edit-solicitud",{id:n,step:"Pago Aprobado"});g.props.solicitud=t.data.solicitud,console.log(t),await axios.post("/api/pago-aprobado",g.props.solicitud)}else await axios.post("/api/edit-solicitud",{id:n,step:"Pago Rechazado"})}),(n,t)=>(r(),i("div",_,[t[8]||(t[8]=o("header",{class:"bg-gray-900 py-4 px-8 flex justify-between items-center"},[o("div",{class:"text-xl font-bold text-yellow-300"},"Estado del Pago")],-1)),o("main",P,[t[7]||(t[7]=o("h2",{class:"text-lg font-semibold mb-4"},"Detalles del Pago",-1)),s(e)===2?(r(),i("div",v,t[0]||(t[0]=[o("img",{src:"/images/check-green.png",alt:"Pago Aprobado",class:"w-[200px] h-[200px] rounded-full"},null,-1)]))):p("",!0),s(e)===3?(r(),i("div",z,t[1]||(t[1]=[o("img",{src:"/images/cros-red.png",alt:"Pago Rechazado",class:"w-[200px] h-[200px] rounded-full"},null,-1)]))):p("",!0),o("div",k,[o("p",R,[t[2]||(t[2]=o("strong",null,"Estado del Pago:",-1)),o("span",{class:h(s(e)===2?"text-green-500":"text-red-500")},l(s(e)===2?"Aprobado":"Rechazado"),3)]),o("p",D,[t[3]||(t[3]=o("strong",null,"ID del Pago:",-1)),d(" "+l(s(a).id),1)]),o("p",S,[t[4]||(t[4]=o("strong",null,"Monto:",-1)),d(" $ "+l(s(a).total),1)]),o("p",A,[t[5]||(t[5]=o("strong",null,"Fecha:",-1)),d(" "+l(x(s(a).created_at)),1)]),s(e)===3?(r(),i("p",C,[t[6]||(t[6]=o("strong",null,"Razón del Rechazo:",-1)),d(" "+l(s(a).motivo),1)])):p("",!0)]),o("div",{class:"text-center mt-6"},[o("button",{onClick:m,class:"bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"}," Continuar ")])])]))}};export{B as default};
