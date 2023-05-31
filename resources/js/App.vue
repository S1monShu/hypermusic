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
  
</style>
