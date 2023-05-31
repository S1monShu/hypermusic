<template>
    <header>
        <RouterLink :to="{name: 'main'}">
        <img src="../assets/images/Лого.png" alt="img" class="logo">
        </RouterLink>
        <div class="menu-items-wrapper">
            <RouterLink :to="{name: 'bass'}">
            Бас-гитары
            </RouterLink>
            <RouterLink :to="{name: 'electric_guitars'}">
            Электрогитары
            </RouterLink>
            <RouterLink :to="{name: 'acoustic_guitars'}">
            Акустика
            </RouterLink>
        </div>
        <div class="searchbar_n_fav_wrapper">
            <div class="searchbar_wrapper">
                <input placeholder="Я ищу..." type="search" class="searchbar" v-model="search"> 
                <div class="search_panel" >
                    <RouterLink tag="div" class="product_container" v-for="product in searchFor" :key="product.id" :to="'/' + product.id">
                        <div class="product_img">
                            <img :src="product.img">
                        </div>
                        <p>{{product.name}}</p>
                    </RouterLink>
                </div>
            </div>

        </div>
    </header>
</template>
<script>
import { toRaw } from "vue";
import { mapActions, mapGetters } from 'vuex';

export default {
    name: 'hp-header',
    data(){
        return{
            guitars: [],
            search: ''
        }
    },
    computed: {
        searchFor(){
            let searchList = [];
            toRaw(this.GUITARS).forEach(element => {
                if(element.name.toLowerCase().includes(this.search.toLowerCase())){
                    searchList.push(element)
                } 
            })
            return searchList
        },
        ...mapGetters([
        'GUITARS'
        ])
    },
    methods:{
      ...mapActions([
        'GET_GUITARS_FROM_API'
      ])
    },
    mounted(){
      this.GET_GUITARS_FROM_API()
    }
}
</script>
<style scoped>
    header{ 
        position: fixed;
        background-color: white;
        font-family: 'Jost';
        font-weight: 500;
        font-size: 20px;
        align-items: center;
        box-sizing: border-box;
        padding: 0 135px 0 135px;
        width: 100%;
        display: flex;
        height: 80px;
        justify-content: space-between;
        z-index: 3;
        border-bottom: 1px solid #c5c5c5;
    }
    .logo{
        width: 315px;
        height: 50px;
    }
    .menu-items-wrapper a{
        padding: 0 24px 0 24px;
        text-decoration: none;
        color: #000000;
    }
    .searchbar_n_fav_wrapper{
        display: flex;
    }
    .searchbar_wrapper{
        display: flex;
        width: 250px;
        align-items: center;
        flex-wrap: wrap;
        max-height: 25px;
    }
    .searchbar_wrapper input{
        font-family: 'NT Somic';
        border: none;
        border-bottom: solid 1px #000000;
        outline: none;
        font-size: 16px;
        padding-bottom: 4px;
    }
    .searchbar_wrapper input::placeholder{
        color: #BD9252;
        font-size: 16px;
    }
    
    .search_btn{
        margin: 0px;
        background-color: white;
        width: 22px;
        height: 22px;
    }
    .search_btn img{
        width: 22px;
        height: 22px;
    }
    
    .search_panel{
        margin-top: 26px;
        position: relative;
        z-index: -1;
        background-color: #FFFFFF;
        margin-left: -20%;
        height: 400px;
        overflow: scroll;
        display: none;
        font-size: 14px;
        font-family: 'NT Somic';
        font-weight: 900;
        border: 1px solid #c5c5c5;
        scrollbar-width: none;
    }
    .product_container{
        display: flex;
        justify-content: space-between;
        padding: 16px;
        border-bottom: solid 1px #c5c5c5;
        text-decoration: none;
        color: #000000;
    }
    .product_img{
        margin-right: 16px;
        height: 60px;
        width: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .product_container img{
        max-width: 100%;
        max-height: 60px;
        
    }
    .product_container p{
        width: 300px;
    }
    .searchbar_wrapper input:focus ~ .search_panel{
        display: inline-block;
    }
    .search_panel:empty{
        height: 0px;
    }
    .searchbar_wrapper .search_panel:empty ~ input{
        padding-top: -12px;
    }
    .search_panel:hover{
        display: inline-block;
    }
    .product_container:hover{
        background-color: #f0f0f0;
    }
</style>