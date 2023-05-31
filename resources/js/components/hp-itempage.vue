<template>
    <div class="hp-itempage-wrapper">
        <div class="hp-itempage">
            <div class="img-wrapper">
                <div class="main-img">
                    <img :src="this.guitar.img" id="img1">
                </div>
                <img v-if="img2 != 'Нету второй фотографии'" :src="this.guitar.imgTwo" id="img2">
                <img v-if="img3 != 'Нету третьей фотографии'" :src="this.guitar.imgThree" id="img3">
            </div>
            <div class="info-wrapper">
                <p class="title">{{this.guitar.name}} </p>
                <p class="price">от {{this.guitar.price}}₽.</p>
                <div class="description-container">
                    <p>{{description[0]}}</p>
                    <p>{{description[1]}}</p>
                    <p>{{description[3]}}</p>
                    <p>{{description[4]}}</p>
                </div>
                <div class="sites-container">
                    <div class="site">
                        <img src="../assets/images/skif.png">
                        <a v-bind:href="this.guitar.skifHref">
                            <div class="sites-info-container">
                                <p>{{this.guitar.name}}</p>
                                <p class="site-item-price">{{this.guitar.price}}₽.</p>
                            </div>
                        </a>
                    </div>
                    <a v-bind:href="this.guitar.myzHref" v-if="price2 != ''">
                        <div class="site">
                            <div id="imgMyz">
                                <img src="../assets/images/myz.jpeg">
                            </div>
                            <div class="sites-info-container">
                                <p>{{this.guitar.name}}</p>
                                <p class="site-item-price">{{this.guitar.price}}₽.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="description">
                    <p class="title">Характеристики</p>
                    <div class="description-container">
                        <p v-for="sentence in description" :key="sentence">
                            {{ sentence }}
                        </p>
                    </div>
                    
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
import { mapGetters } from 'vuex'
import { toRaw } from 'vue'

export default {
    data(){
        return{
            name: 'hp-item-page', 
            id: Number(this.$route.params['id']),
            guitar: [],
            description: [],
            price2: '',
            img2: '',
            img3: '',
            artist: []
        }
    },
    watch:{
        $route (toR, fromR){
            this.id = Number(toR.params['id'])
        }
    },
    computed:{
        ...mapGetters([
            'GUITAR', 'ARTIST'
        ]),
    },
    mounted(){
        this.guitar = toRaw(this.GUITAR(this.id))
        this.description = this.guitar.specifications.split('\n')
        this.description = this.description.slice(1, 9)
        this.price2 = this.guitar.price2
        this.img2 = this.guitar.imgTwo
        this.img3 = this.guitar.imgThree
        this.artist = toRaw(Object.values(this.ARTIST))
    }
}
</script>
<style scoped>
    
    .hp-itempage{
        margin: 101px 225px 0 225px;
        display: flex;
        justify-content: space-between;
        background-color: #FFFFFF;
        padding: 56px;
        height: 900px;
    }
    .hp-itempage-wrapper{
        padding-top: 80px;
    }
    .img-wrapper{
        display: grid;
        width: 445px;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: repeat(4, 1fr);
        grid-row-gap: 48px;
        grid-column-gap: 20px;
    }
    .main-img{
        display: flex;
        justify-content: center;
        grid-row-start: 1;
        grid-row-end: 2;
        grid-column-start: 1;
        grid-column-end: 5;
    }
    #img1{
        height: 445px;
    }
    #img2{
        grid-column-start: 2;
        grid-column-end: 3;
        grid-row-start: 2;
        grid-row-end: 3;
    }
    #img3{
        grid-column-start: 3;
        grid-column-end: 4;
        grid-row-start: 2;
        grid-row-end: 3;
    }
    .info-wrapper{
        width: 538px;
    }
    .title{
        font-size: 24px;
        font-family: 'NT Somic';
        font-weight: 700;
        margin: 0;
        margin-bottom: 36px;
    }
    .price{
        font-size: 24px;
        font-family: 'NT Somic';
        font-weight: 700;
    }
    .description{
        margin-top: 96px;
    }
    .description-container{
        font-size: 16px;
        margin-top: 28px;
        font-weight: 600;
    }
    .description-container p{
        margin: 8px 0 0 0;
    }
    .sites-container{
        margin-top: 48px;
    }
    a{
        text-decoration: none;
        color: #000000;
    }
    .site{
        display: flex;
        width: 538px;
        height: 121px;
        background-color: #FFFFFF;
        border-bottom: 1px solid #000000;
    }
    .sites-info-container{
        margin: 18px 0 0 24px;
        font-weight: 600;
    }
    .site-item-price{
        margin-top: 18px;
        font-size: 20px;
    }
    #imgMyz{
        width: 121px;
        height: 121px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #imgMyz img{
        width: 86px;
        height: 86px;
    }
</style>