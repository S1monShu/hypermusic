<template>
    <div class="main-wrapper">
        <div class="main_image">
            <p>Главная</p>
        </div>
        <div class="hp-popular-wrapper">
            <p class="title">ПОПУЛЯРНЫЕ МОДЕЛИ</p>
            <div class="hp-popular">
                <div class="hp-popular-items">
                    <RouterLink class="hp-popular-item" v-for="value in popularList" :key="value.guitars" :to="'/' + value.id">
                      <img :src="value.img" alt="img" class="crop">
                      <div class="info_container">
                        <p>{{value.name}}</p>
                        <p class="item_price">От {{value.price}}₽.</p>
                      </div>
                    </RouterLink>
                  </div>
            </div>
        </div>
        <div class="hp-categories-wrapper">
            <p class="title">КАТЕГОРИИ</p>
            <div class="hp-categories">
                <div class="hp-categories-items">
                    <RouterLink :to="{name: 'acoustic_guitars'}" tag="div" id="acoustic_guitars">
                        <p>АКУСТИКА</p>
                    </RouterLink>
                    <RouterLink :to="{name: 'bass'}" tag="div" id="bass">
                        <p>БАСС</p>
                    </RouterLink>
                    <RouterLink :to="{name: 'electric_guitars'}" tag="div" id="electric_guitars">    
                        <p>ЭЛЕКТРОГИТАРЫ</p>
                    </RouterLink>
                </div>
            </div>
        </div>
        <div class="artist-quote-wrapper" :style="`--my-src: url(${this.artist[3]})`">
            <div class="artist-quote" >
                <div class="quote-container">
                    <p>{{this.artist[2]}}</p>
                    <p>{{this.artist[1]}}</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { toRaw } from 'vue';
import { mapGetters, mapActions } from 'vuex';

export default {
    data(){
        return{
            name: 'main',
            popularlist_names: [
                'Электрогитара Fender Squier Affinity Stratocaster Maple FB Lake Placid Blue',
                'Акустическая гитара Shinobi V-1/N',
                'Электрогитара S by Solar AB4.6С Black',
                'Бас-гитара Jackson JS Concert Bass JS3V QM 5-String Transparent Black Burst'
            ],
            artist: []
        }
    },
    computed:{
        ...mapGetters([
        'GUITARS', 'ARTIST'
        ]),
        popularList(){
            let popularlist = []
            toRaw(this.GUITARS).forEach(element => {
                this.popularlist_names.forEach(name => {
                    if(element.name.includes(name)){
                        popularlist.push(element)
                    }
                })
            })
            return popularlist
        },
    },
    methods:{
      ...mapActions([
        'GET_GUITARS_FROM_API'
      ])
    },
    mounted(){
      this.GET_GUITARS_FROM_API()
      this.artist = toRaw(Object.values(this.ARTIST))
    }
}
</script>
<style>
    body{
        background-color: #f0f0f0;
    }
    .main_image{
        width: 100%;
        height: 700px;
        background-size: cover;
        background-image: url(../assets/images/Main_Image.png);
        display: flex;
        align-items: flex-end;
    }
    .hp-popular{
        width: 100%;
        display: flex;
        justify-content: center;
    }
    .hp-popular-items{
        width: 1288px;
        margin-top: 72px;
        justify-content: space-between;
        display: flex;
    }
    .main_image p{
        margin: 0 0 36px 225px;
        color: #FFFFFF;
        font-family: 'Jost';
        font-weight: 600;
        font-size: 64px;
    }
    .hp-popular-item{
        height: 416px;
        width: 259px;
        font-family: 'NT Somic';
        font-size: 14px;
        padding: 24px;
        background-color: #ffffff;
        text-decoration: none;
        color: #000000;
    }
    .title {
        font-size: 36px;
        margin: 96px 0 0 225px;
    }
    .hp-popular-item p {
        font-weight: 700;
        font-size: 14px;
    }
    .hp-popular-item img {
        position: relative;
        max-width: 100%;
        max-height: 256px;
        margin: 0 auto;
        display: block;
    }
    .info_container{
        margin-top: 48px;
        display: flex;
        flex-direction: column;
    }
    .hp-popular-item .item_price{
        font-weight: 500;
        padding-top: 8px;
        font-size: 14px; 
    }
    .hp-categories{
        margin-top: 72px;
        width: 100%;
        display: flex;
        justify-content: center;
    }
    .hp-categories-items{
        width: 1288px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-auto-rows: 357px;
        row-gap: 20px;
        column-gap: 20px;
    }
    #acoustic_guitars{
        background-image: url(../assets/images/acoustic_categorie.png);
        text-decoration: none;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 36px;
        font-weight: 600;
        color: #FFFFFF;
        background-size: cover;
        grid-column-start: 1;
        grid-column-end: 2;
        grid-row-start: 1;
        grid-row-end: 2;
    }
    #bass{
        background-image: url(../assets/images/bass_categorie.png);
        text-decoration: none;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 36px;
        font-weight: 600;
        color: #FFFFFF;
        background-size: cover;
        grid-column-start: 2;
        grid-column-end: 3;
        grid-row-start: 1;
        grid-row-end: 2;
    }
    #electric_guitars{
        background-image: url(../assets/images/electric_categorie.png);
        text-decoration: none;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 36px;
        font-weight: 600;
        color: #FFFFFF;
        background-size: cover;
        grid-column-start: 1;
        grid-column-end: 3;
        grid-row-start: 2;
        grid-row-end: 3;
    }
    .artist-quote-wrapper{
        margin-top: 96px;
        background-image: var(--my-src);
        background-size: cover;
        background-position: bottom;
        height: 457px;
        width: 100%;
        display: flex;
    }
    .artist-quote{
        margin-top: 235px;
        width: 100%;
        height: 186px;
        background-color: rgba(100%, 100%, 100%, 84%);
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .quote-container{
        font-size: 18px;
        font-family: 'NT Somic';
        font-weight: 600;
    }
    .quote-container p{
        margin: 12px 0 12px 0;
        letter-spacing: 1px;
    }
</style>