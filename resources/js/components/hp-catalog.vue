<template>
    <div class="hp-catalog">
      <RouterLink tag="div" class="hp-catalog-item" v-for="value in guitars" :key="value.id" :to="'/' + value.id">
        <img :src="value.img" alt="img" class="crop">
        <div class="info_container">
          <p>{{value.name}}</p>
          <p class="item_price">От {{value.price}}₽.</p>
        </div>
    </RouterLink>
    </div>
</template>
<script>

export default {
      
        name: 'hp-catalog',
        data(){
          return{
            cardsPerPage: 12,
            productpath: ''
          }
        }, 
        props: {
          guitars: {
            type: Array, 
            default(){
              return{}
            }
          }
        },
        mounted() {
          console.log(this.guitars)
        },
}
</script>
<style scoped>
.hp-catalog{
  display: grid;
  grid-template-columns: repeat(3, 307px);
  grid-column-gap: 24px;
  grid-row-gap: 36px;
}
.hp-catalog-item{
  height: 416px;
  width: 259px;
  font-family: 'NT Somic';
  font-size: 14px;
  padding: 24px;
  background-color: #ffffff;
  text-decoration: none;
  color: #000000;
}
img {
  position: relative;
  max-width: 100%;
  max-height: 256px;
  margin: 0 auto;
  display: block;
}
p{
  font-weight: 700;
}
.info_container{
  margin-top: 48px;
  display: flex;
  flex-direction: column;
}
.item_price{
  font-weight: 500;
  padding-top: 8px;
  font-size: 14px; 
  text-decoration: none;
}
.catalog_pagination{
  display: flex;
  flex-wrap: wrap;
}
</style>