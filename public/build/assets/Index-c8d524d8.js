import{q as W,s as P,x as ie,r as h,y as S,z as Y,u as x,A as re,B as ae,C as ue,D as ce,j as O,E as J,G as de,d as A,H as fe,o as y,c as q,w as m,b as i,a as v,e as _,g as k,F as R,t as pe,O as N,I as ve,T as me,Z as ge,J as he,h as we,n as _e,f as ye}from"./app-1f9e1dec.js";import{_ as be}from"./AuthenticatedLayout.vue_vue_type_script_setup_true_lang-b07e69b3.js";import{_ as xe,F as $e,P as ke,f as Ce,g as Se}from"./MapContainer.vue_vue_type_script_setup_true_lang-51df3485.js";import{_ as T}from"./Modal.vue_vue_type_script_setup_true_lang-e417d840.js";import{_ as B}from"./PrimaryButton.vue_vue_type_script_setup_true_lang-9c65d1f6.js";import{H as L}from"./H3-7655e5ac.js";import{_ as Ie}from"./hidden-ab3bc168.js";import"./_plugin-vue_export-helper-c27b6911.js";function Oe(e,t){let n,l,o;const u=h(!0),d=()=>{u.value=!0,o()};S(e,d,{flush:"sync"});const r=typeof t=="function"?t:t.get,s=typeof t=="function"?void 0:t.set,c=Y((f,a)=>(l=f,o=a,{get(){return u.value&&(n=r(),u.value=!1),l(),n},set(p){s==null||s(p)}}));return Object.isExtensible(c)&&(c.trigger=d),c}function j(e){return re()?(ae(e),!0):!1}function C(e){return typeof e=="function"?e():x(e)}const z=typeof window<"u"&&typeof document<"u",Ae=Object.prototype.toString,Ee=e=>Ae.call(e)==="[object Object]",X=()=>{},H=Me();function Me(){var e;return z&&((e=window==null?void 0:window.navigator)==null?void 0:e.userAgent)&&/iP(ad|hone|od)/.test(window.navigator.userAgent)}function Ne(...e){if(e.length!==1)return ue(...e);const t=e[0];return typeof t=="function"?ce(Y(()=>({get:t,set:X}))):h(t)}function Pe(e,t=!0){W()?P(e):t?e():ie(e)}function I(e){var t;const n=C(e);return(t=n==null?void 0:n.$el)!=null?t:n}const Z=z?window:void 0,Te=z?window.navigator:void 0;function Be(){const e=h(!1);return W()&&P(()=>{e.value=!0}),e}function K(e){const t=Be();return O(()=>(t.value,!!e()))}function Le(){const e=W(),t=Oe(()=>null,()=>e.proxy.$el);return de(t.trigger),P(t.trigger),t}function je(e,t,n={}){const{window:l=Z,...o}=n;let u;const d=K(()=>l&&"ResizeObserver"in l),r=()=>{u&&(u.disconnect(),u=void 0)},s=O(()=>Array.isArray(e)?e.map(a=>I(a)):[I(e)]),c=S(s,a=>{if(r(),d.value&&l){u=new ResizeObserver(t);for(const p of a)p&&u.observe(p,o)}},{immediate:!0,flush:"post",deep:!0}),f=()=>{r(),c()};return j(f),{isSupported:d,stop:f}}function ze(e,t={width:0,height:0},n={}){const{window:l=Z,box:o="content-box"}=n,u=O(()=>{var s,c;return(c=(s=I(e))==null?void 0:s.namespaceURI)==null?void 0:c.includes("svg")}),d=h(t.width),r=h(t.height);return je(e,([s])=>{const c=o==="border-box"?s.borderBoxSize:o==="content-box"?s.contentBoxSize:s.devicePixelContentBoxSize;if(l&&u.value){const f=I(e);if(f){const a=l.getComputedStyle(f);d.value=Number.parseFloat(a.width),r.value=Number.parseFloat(a.height)}}else if(c){const f=Array.isArray(c)?c:[c];d.value=f.reduce((a,{inlineSize:p})=>a+p,0),r.value=f.reduce((a,{blockSize:p})=>a+p,0)}else d.value=s.contentRect.width,r.value=s.contentRect.height},n),S(()=>I(e),s=>{d.value=s?t.width:0,r.value=s?t.height:0}),{width:d,height:r}}function Q(e={}){const{enableHighAccuracy:t=!0,maximumAge:n=3e4,timeout:l=27e3,navigator:o=Te,immediate:u=!0}=e,d=K(()=>o&&"geolocation"in o),r=h(null),s=J(null),c=h({accuracy:0,latitude:Number.POSITIVE_INFINITY,longitude:Number.POSITIVE_INFINITY,altitude:null,altitudeAccuracy:null,heading:null,speed:null});function f($){r.value=$.timestamp,c.value=$.coords,s.value=null}let a;function p(){d.value&&(a=o.geolocation.watchPosition(f,$=>s.value=$,{enableHighAccuracy:t,maximumAge:n,timeout:l}))}u&&p();function b(){a&&o&&o.geolocation.clearWatch(a)}return j(()=>{b()}),{isSupported:d,coords:c,locatedAt:r,error:s,resume:p,pause:b}}function Ve(e=Le()){const t=J(),n=()=>{const l=I(e);l&&(t.value=l.parentElement)};return Pe(n),S(()=>C(e),n),t}function De(e){var t;const n=C(e);return(t=n==null?void 0:n.$el)!=null?t:n}const Fe=z?window:void 0;function Re(...e){let t,n,l,o;if(typeof e[0]=="string"||Array.isArray(e[0])?([n,l,o]=e,t=Fe):[t,n,l,o]=e,!t)return X;Array.isArray(n)||(n=[n]),Array.isArray(l)||(l=[l]);const u=[],d=()=>{u.forEach(f=>f()),u.length=0},r=(f,a,p,b)=>(f.addEventListener(a,p,b),()=>f.removeEventListener(a,p,b)),s=S(()=>[De(t),C(o)],([f,a])=>{if(d(),!f)return;const p=Ee(a)?{...a}:a;u.push(...n.flatMap(b=>l.map($=>r(f,b,$,p))))},{immediate:!0,flush:"post"}),c=()=>{s(),d()};return j(c),c}const We=A({name:"UseGeolocation",props:["enableHighAccuracy","maximumAge","timeout","navigator"],setup(e,{slots:t}){const n=fe(Q(e));return()=>{if(t.default)return t.default(n)}}});function F(e){return typeof Window<"u"&&e instanceof Window?e.document.documentElement:typeof Document<"u"&&e instanceof Document?e.documentElement:e}function ee(e){const t=window.getComputedStyle(e);if(t.overflowX==="scroll"||t.overflowY==="scroll"||t.overflowX==="auto"&&e.clientWidth<e.scrollWidth||t.overflowY==="auto"&&e.clientHeight<e.scrollHeight)return!0;{const n=e.parentNode;return!n||n.tagName==="BODY"?!1:ee(n)}}function qe(e){const t=e||window.event,n=t.target;return ee(n)?!1:t.touches.length>1?!0:(t.preventDefault&&t.preventDefault(),!1)}function Ue(e,t=!1){const n=h(t);let l=null,o;S(Ne(e),r=>{const s=F(C(r));if(s){const c=s;o=c.style.overflow,n.value&&(c.style.overflow="hidden")}},{immediate:!0});const u=()=>{const r=F(C(e));!r||n.value||(H&&(l=Re(r,"touchmove",s=>{qe(s)},{passive:!1})),r.style.overflow="hidden",n.value=!0)},d=()=>{const r=F(C(e));!r||!n.value||(H&&(l==null||l()),r.style.overflow=o,n.value=!1)};return j(d),O({get(){return n.value},set(r){r?u():d()}})}function Ge(){let e=!1;const t=h(!1);return(n,l)=>{if(t.value=l.value,e)return;e=!0;const o=Ue(n,l.value);S(t,u=>o.value=u)}}Ge();const He={class:"p-6 space-y-2"},Ye=i("p",null," Il revient dans quelque temps avec l'information que tu lui as demandé, en attendant tu peux retourner à tes occupations. ",-1),Je={class:"flex flex-col gap-2"},te=A({__name:"PigeonSentModal",props:{show:{type:Boolean}},emits:["close"],setup(e,{emit:t}){const n=t;return(l,o)=>(y(),q(T,{show:l.show,onClose:o[1]||(o[1]=u=>n("close"))},{default:m(()=>[i("div",He,[v(L,null,{default:m(()=>[_(" Ton pigeon est parti ")]),_:1}),Ye,i("div",Je,[v(B,{type:"button",onClick:o[0]||(o[0]=u=>n("close"))},{default:m(()=>[_(" Ok, merci ! ")]),_:1})])])]),_:1},8,["show"]))}}),Xe={class:"p-6 space-y-2"},Ze=i("p",null," Cliquez sur un point de la carte du monde pour m'envoyer chercher une information. ",-1),Ke={class:"flex flex-col gap-2"},Qe=A({__name:"PigeonNoNewsModal",props:{show:{type:Boolean}},emits:["close"],setup(e,{emit:t}){const n=t;return(l,o)=>(y(),q(T,{show:l.show,onClose:o[1]||(o[1]=u=>n("close"))},{default:m(()=>[i("div",Xe,[v(L,null,{default:m(()=>[_(" Je n'ai pas encore récupéré d'information ! ")]),_:1}),Ze,i("div",Ke,[v(B,{type:"button",onClick:o[0]||(o[0]=u=>n("close"))},{default:m(()=>[_(" Ok, j'y vais ! ")]),_:1})])])]),_:1},8,["show"]))}}),et={class:"relative flex flex-col items-end gap-1"},tt={class:"w-14 h-14"},nt={key:0,class:"h-full w-full",src:"/assets/images/pigeon-icon-travelling.svg",alt:""},ot=i("img",{class:"h-full w-full",src:"/assets/images/pigeon-icon-message.svg",alt:""},null,-1),st=i("div",{class:"absolute -top-2.5 -right-2.5 flex items-center justify-center h-8 w-8 bg-red rounded-full"},[i("span",{class:"text-button text-white -mb-1"}," 1 ")],-1),lt={key:1,class:"h-full w-full",src:"/assets/images/pigeon-icon-no-message.svg",alt:""},it={class:"sr-only"},rt=A({__name:"PigeonPerch",props:{pigeon:{}},emits:["click"],setup(e,{emit:t}){const n=e,l=h(!1),o=h(!1);function u(){if(n.pigeon.isTravelling){o.value=!0;return}if(n.pigeon.news.length===0){l.value=!0;return}N.visit(route("news.show",n.pigeon.news[0]))}const d=O(()=>{var r,s;return n.pigeon.news.length?!((s=(r=n.pigeon.news[0])==null?void 0:r.message)!=null&&s.is_read):!1});return(r,s)=>(y(),k("div",et,[i("div",tt,[r.pigeon.isTravelling?(y(),k("img",nt)):(y(),k(R,{key:1},[d.value?(y(),k(R,{key:0},[ot,st],64)):(y(),k("img",lt))],64))]),i("button",{onClick:u,class:"absolute top-0 left-0 h-full w-full pointer-events-auto"},[i("span",it,pe(r.pigeon.isTravelling?"Voir le pigeon":d.value?"Voir le message":"Voir le dernier message"),1)]),v(te,{show:o.value,onClose:s[0]||(s[0]=c=>o.value=!1)},null,8,["show"]),v(Qe,{show:l.value,onClose:s[1]||(s[1]=c=>l.value=!1)},null,8,["show"])]))}}),at={class:"p-6 space-y-2"},ut=i("div",{class:"flex flex-col gap-4 mb-1"},[i("div",{class:"flex gap-2 items-start"},[i("img",{src:"/assets/images/MapPoint_Blue.png",class:"w-7"}),i("p",{class:"text-meta self-center"},"Information à aller chercher !")]),i("div",{class:"flex gap-2 items-start"},[i("img",{src:"/assets/images/MapPoint_Checked.png",class:"w-7"}),i("p",{class:"text-meta self-center"},"Information déjà recupérée, tu peux la relire à tout moment ")]),i("div",{class:"flex gap-2 items-start"},[i("img",{src:"/assets/images/MapPoint_Disabled.png",class:"w-7"}),i("p",{class:"text-meta self-center"},"Attends que ton pigeon revienne pour l'envoyer chercher cette information")]),i("div",{class:"flex gap-2 items-start"},[i("img",{src:"/assets/images/MapPoint_PinkLosange.png",class:"w-7"}),i("p",{class:"text-meta self-center"},"Tu as écrit cette information")])],-1),ct={class:"flex flex-col gap-2 mt-2"},dt=A({__name:"MapLegend",props:{show:{type:Boolean}},emits:["close"],setup(e,{emit:t}){const n=t;return(l,o)=>(y(),q(T,{show:l.show,onClose:o[1]||(o[1]=u=>n("close"))},{default:m(()=>[i("div",at,[v(L,{class:"mb-4"},{default:m(()=>[_(" Légende de la carte ")]),_:1}),ut,i("div",ct,[v(B,{type:"button",onClick:o[0]||(o[0]=u=>n("close"))},{default:m(()=>[_(" J'ai compris ! ")]),_:1})])])]),_:1},8,["show"]))}}),ft=i("title",null,"Informations",-1),pt=i("span",{class:"not-sr-only text-button p-1"},"?",-1),vt=i("span",{class:"sr-only"},"Voir la légende de la carte",-1),mt=[pt,vt],gt={class:"fixed max-w-mobile w-full bottom-20 pointer-events-none flex justify-end p-4"},ht=["onSubmit"],wt={key:0,class:"text-red"},_t=i("br",null,null,-1),yt={class:"flex flex-col gap-2"},At=A({__name:"Index",props:{news:{},pigeon:{}},setup(e){const t=e,n=h(),l=Ve(n),o=ze(l);let u;P(()=>{u=setInterval(()=>N.reload({only:["news","pigeon"]}),1e4)}),ve(()=>{clearInterval(u)});const d=O(()=>t.news.map(g=>{let w=new $e({geometry:new ke(Ce([g.lng,g.lat])),data:{newsId:g.id,newsUserId:g.user_id}});return w.setStyle(Se(g,t.pigeon)),w}));function r(g){var G;const w=g.get("data").newsId,E=g.get("data").newsUserId,M=t.pigeon.news.find(D=>D.id===w);if((G=M==null?void 0:M.message)!=null&&G.is_arrived||E===t.pigeon.user_id){N.visit(route("news.show",w));return}if(t.pigeon.isTravelling){c.value=!0;return}const U=t.news.find(D=>D.id===w);U&&ne(U)}const s=h(null),c=h(!1),f=h(!1),a=me({lat:44.836151,lng:-.580816}),{coords:p,locatedAt:b,error:$}=Q();function ne(g){s.value=g}function oe(){var g;s.value&&(p.value.latitude&&p.value.latitude!==1/0&&(a.lat=p.value.latitude),p.value.longitude&&p.value.longitude!==1/0&&(a.lng=p.value.longitude),a.post(route("pigeon.get-news",(g=s.value)==null?void 0:g.id),{preserveScroll:!0,onSuccess:()=>{V(),c.value=!0},onFinish:()=>{a.reset(),N.reload()}}))}function V(){s.value=null,a.reset()}function se(){if(t.pigeon.isTravelling){c.value=!0;return}}function le(){f.value=!0}return(g,w)=>(y(),k(R,null,[v(x(ge),null,{default:m(()=>[ft]),_:1}),v(be,null,{default:m(()=>[i("button",{class:"absolute m-3 z-50 h-9 w-9 bg-pink border flex justify-center content-center rounded-full",onClick:le},mt),v(dt,{show:f.value,onClose:w[0]||(w[0]=E=>f.value=!1)},null,8,["show"]),v(xe,{ref_key:"map",ref:n,class:"h-full",style:he(`height: ${x(o).height.value}px`),features:d.value,onClickFeature:r},null,8,["style","features"]),i("div",gt,[v(rt,{pigeon:g.pigeon,onClick:se},null,8,["pigeon"])]),v(T,{show:!!s.value,onClose:V},{default:m(()=>[v(x(We),null,{default:m(({coords:{latitude:E,longitude:M}})=>[i("form",{onSubmit:ye(oe,["prevent"]),class:"p-6 space-y-2"},[v(L,null,{default:m(()=>[_(" Je dois aller chercher cette information ? ")]),_:1}),x(a).errors.lat||x(a).errors.lng?(y(),k("p",wt,[_(" Votre position est requise pour que je puisse partir."),_t,_(" Autorisez la géolocalisation pour que je sache où vous retrouver ! ")])):we("",!0),i("div",yt,[v(B,{class:_e({"opacity-25":x(a).processing}),disabled:x(a).processing},{default:m(()=>[_(" Oui, celle là ! ")]),_:1},8,["class","disabled"]),v(Ie,{type:"button",onClick:V},{default:m(()=>[_(" Non, annuler ")]),_:1})])],40,ht)]),_:1})]),_:1},8,["show"]),v(te,{show:c.value,onClose:w[1]||(w[1]=E=>c.value=!1)},null,8,["show"])]),_:1})],64))}});export{At as default};
