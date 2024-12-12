import{T as g,e as p,b as i,u as o,w as m,F as x,o as d,Z as w,t as v,f as u,a as s,i as k,j as f,v as c,g as a,c as y,k as _}from"./app-Qpi9dm6T.js";import{A as V}from"./AuthenticationCard-DZpFaZGS.js";import{_ as B}from"./Checkbox-yddQMSlO.js";import{_ as C}from"./PrimaryButton-CyjTHMnD.js";import{_ as S}from"./_plugin-vue_export-helper-DlAUqK2U.js";const h={key:0,class:"mb-4 font-medium text-sm text-green-600"},A={class:"login-container"},E={class:"login-card"},N={class:"input-group"},R={class:"input-group"},j={class:"block mt-4"},q={class:"flex items-center"},F={class:"ml-20 items-center links"},I={class:"bg-blue-500 h-[60px] w-[400px] mt-2"},T={__name:"Welcome",props:{canResetPassword:Boolean,status:String},setup(l){const t=g({email:"",password:"",remember:!1}),b=()=>{t.transform(n=>({...n,remember:t.remember?"on":""})).post(route("login"),{onFinish:()=>t.reset("password")})};return(n,e)=>(d(),p(x,null,[i(o(w),{title:"Log in"}),i(V,{style:{"background-color":"#2a3b47"}},{default:m(()=>[l.status?(d(),p("div",h,v(l.status),1)):u("",!0),s("div",A,[s("div",E,[e[10]||(e[10]=s("h2",null,"Inicio de Sesión",-1)),s("form",{onSubmit:k(b,["prevent"])},[s("div",N,[e[3]||(e[3]=s("label",{for:"rut"},"Email:",-1)),f(s("input",{type:"text",id:"rut",placeholder:"Email","onUpdate:modelValue":e[0]||(e[0]=r=>o(t).email=r),autocomplete:"email"},null,512),[[c,o(t).email]])]),s("div",R,[e[4]||(e[4]=s("label",{for:"password"},"Contraseña:",-1)),f(s("input",{type:"password",id:"password",placeholder:"Contraseña","onUpdate:modelValue":e[1]||(e[1]=r=>o(t).password=r)},null,512),[[c,o(t).password]])]),i(C,{type:"submit",class:"btn-primary justify-center",disabled:o(t).processing},{default:m(()=>e[5]||(e[5]=[a("Iniciar Sesión")])),_:1},8,["disabled"]),s("div",j,[s("label",q,[i(B,{checked:o(t).remember,"onUpdate:checked":e[2]||(e[2]=r=>o(t).remember=r),name:"remember"},null,8,["checked"]),e[6]||(e[6]=s("span",{class:"ms-2 text-sm text-gray-600"},"Remember me",-1))])])],32),s("div",F,[e[9]||(e[9]=s("p",{class:"bg-green-500 h-[60px] w-[400px] justify-center text-center"},[a("¿Aún no estás registrado? "),s("a",{href:"/register"},"Regístrate aquí")],-1)),s("p",I,[e[8]||(e[8]=a("¿Olvidaste tu contraseña? ")),l.canResetPassword?(d(),y(o(_),{key:0,href:n.route("password.request")},{default:m(()=>e[7]||(e[7]=[a(" Haz click aquí ")])),_:1},8,["href"])):u("",!0)])]),e[11]||(e[11]=s("div",{class:"ml-20 support"},[s("p",{class:"bg-red-500 h-[60px] w-[400px] mt-2"},[a("¿Aún tienes problemas con tu registro u otro sistema? Envía un correo a "),s("a",{href:"mailto:registro@laflorida.cl"},"registro@laflorida.cl")])],-1))])])]),_:1})],64))}},$=S(T,[["__scopeId","data-v-db86a6e1"]]);export{$ as default};
