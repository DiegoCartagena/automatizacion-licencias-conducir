import{A as c}from"./AppLayout-CnokBy6r.js";import l from"./DeleteUserForm-wTfO8ggx.js";import f from"./LogoutOtherBrowserSessionsForm-BkKvQ1IN.js";import{S as s}from"./SectionBorder-PSUWQz7g.js";import u from"./TwoFactorAuthenticationForm-BKkfKjVc.js";import d from"./UpdatePasswordForm-B3guWSQ6.js";import _ from"./UpdateProfileInformationForm-LCo3lpLJ.js";import{c as h,w as p,o as e,a as i,e as r,b as t,f as a,F as g}from"./app-Qpi9dm6T.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";/* empty css                                                                  */import"./DialogModal-NfkFURMK.js";import"./SectionTitle-BGamRhft.js";import"./DangerButton-6MJRb9lW.js";import"./InputError-4TJMJNVh.js";import"./SecondaryButton-CKBdyLcD.js";import"./TextInput-BJ7_UUx3.js";import"./ActionMessage-vQkk_JYG.js";import"./PrimaryButton-CyjTHMnD.js";import"./InputLabel-DFxRzcYS.js";import"./FormSection-BVqLC_NW.js";const $={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={key:0},y={key:1},k={key:2},z={__name:"Show",props:{confirmsTwoFactorAuthentication:Boolean,sessions:Array},setup(m){return(o,n)=>(e(),h(c,{title:"Profile"},{header:p(()=>n[0]||(n[0]=[i("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Profile ",-1)])),default:p(()=>[i("div",null,[i("div",$,[o.$page.props.jetstream.canUpdateProfileInformation?(e(),r("div",w,[t(_,{user:o.$page.props.auth.user},null,8,["user"]),t(s)])):a("",!0),o.$page.props.jetstream.canUpdatePassword?(e(),r("div",y,[t(d,{class:"mt-10 sm:mt-0"}),t(s)])):a("",!0),o.$page.props.jetstream.canManageTwoFactorAuthentication?(e(),r("div",k,[t(u,{"requires-confirmation":m.confirmsTwoFactorAuthentication,class:"mt-10 sm:mt-0"},null,8,["requires-confirmation"]),t(s)])):a("",!0),t(f,{sessions:m.sessions,class:"mt-10 sm:mt-0"},null,8,["sessions"]),o.$page.props.jetstream.hasAccountDeletionFeatures?(e(),r(g,{key:3},[t(s),t(l,{class:"mt-10 sm:mt-0"})],64)):a("",!0)])])]),_:1}))}};export{z as default};