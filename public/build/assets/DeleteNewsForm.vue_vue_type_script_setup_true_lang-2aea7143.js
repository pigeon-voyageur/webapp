import{d as u,r as f,Q as _,g as p,a as t,w as e,o as d,e as o,b as r,f as w,O as h}from"./app-1f9e1dec.js";import{_ as N}from"./DangerButton.vue_vue_type_script_setup_true_lang-7b26776d.js";import{_ as v}from"./Modal.vue_vue_type_script_setup_true_lang-e417d840.js";import{_ as a}from"./hidden-ab3bc168.js";const x=["onSubmit"],C={class:"mt-6 space-y-2"},S=u({__name:"DeleteNewsForm",props:{news:{}},setup(i){const c=i,s=f(!1);_().props.auth.user;const l=()=>{s.value=!0},m=()=>{h.delete(route("news.destroy",c.news.id))},n=()=>{s.value=!1};return(b,k)=>(d(),p("section",null,[t(N,{onClick:l},{default:e(()=>[o("Supprimer cette information")]),_:1}),t(v,{show:s.value,onClose:n},{header:e(()=>[o(" Es-tu sûr de vouloir supprimer cette information ? ")]),default:e(()=>[r("form",{onSubmit:w(m,["prevent"])},[r("div",C,[t(a,{class:"text-red"},{default:e(()=>[o(" Oui, supprimer cette information ")]),_:1}),t(a,{type:"button",onClick:n},{default:e(()=>[o(" Non, annuler ")]),_:1})])],40,x)]),_:1},8,["show"])]))}});export{S as _};
