<template>
  <div id="app">
    <hpHeader />
    <RouterView></RouterView>
    <hpFooter />
  </div>
</template>

<script>
  import hpHeader from './components/hp-header.vue';
  import hpFooter from './components/hp-footer.vue'

  export default{
    name: 'app',
    components: {
    hpHeader,
    hpFooter
    },
  }
</script>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');
  @font-face {
  font-family: "NT Somic";
  src: local("NT Somic"),
   url(../assets/fonts/NTSomic-VF.ttf) format("truetype");
}
</style>
