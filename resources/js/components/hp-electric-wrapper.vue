<template>
    <div class="hp-electric">
        <div id="hp-page-theme">
            <p>Электрогитары</p>
        </div>
        <div class="hp-electric-wrapper">
            <hpSelect 
            v-bind:models="model_options" v-bind:orientations="orientation_options" v-bind:creators="creators_options" v-on:selectoptionstring="chooseCategorie"/>
         <div class="catalog">
            <hpCatalog v-bind:guitars="paginatedGuitarsList" v-bind:path="pathElectric"/>
            <div class="catalog_pagination_wrapper">
                <div class="page" v-show="this.pageNumber>2" @click="firstPage()"><img src="../assets/icons/navigate_next-1.png"></div>
                <div class="page" v-show="this.pageNumber>1" @click="prevPage()"><img src="../assets/icons/navigate_next-3.png"></div>
                <div class="page" v-for="page in pages" :key="page" @click="selectPage(page.name)"  :class="{ active: isPageActive(page.name)}">
                  {{ page.name }}
                </div>
                <div class="page" v-show="this.pageNumber<allPagesList" @click="nextPage()"><img src="../assets/icons/navigate_next-2.png"></div>
                <div class="page" v-show="this.pageNumber<allPagesList - 1" @click="lastPage()"><img src="../assets/icons/navigate_next.png"></div>
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
import { toRaw } from "vue";
import hpCatalog from './hp-catalog.vue';
import hpSelect from './hp-select-wrapper.vue';
import { mapGetters, mapActions } from "vuex";

    export default{
        name: 'hp-electric-wrapper',
        data(){
            return {
                model_options: [
                    {name: 'Telecaster', value: 1},
                    {name: 'Stratocaster', value: 2},
                    {name: 'Superstrat', value: 3},
                    {name: 'Vulture', value: 4},
                    {name: 'Explorer', value: 5},
                    {name: 'Single cut', value: 6},
                    {name: 'Double cut', value: 7},
                    {name: 'Les Paul', value: 8},
                ],
                orientation_options: [
                    {name: 'под правую руку', value: 9},
                    {name: 'под левую руку', value: 10},
                ],
                creators_options: [
                    {name: 'Jackson', value: 11},
                    {name: 'LTD', value: 12},
                    {name: 'Carvin', value: 13},
                    {name: 'Fender', value: 14},
                    {name: 'Ibanez', value: 15},
                    {name: 'Rusich', value: 16},
                    {name: 'Gibson', value: 17},
                    {name: 'Tokai', value: 18},
                    {name: 'Gibson', value: 19},
                    {name: 'Cort', value: 20},
                    {name: 'Schecter', value: 21},
                    {name: 'Squier by Fender', value: 22},
                    {name: 'S by Solar', value: 23},
                    {name: 'Epiphone', value: 24},
                ],
                cardsPerPage: 12,
                pageNumber: 1,
                maxVisibleButtons: 3,
                options: [],
                artist: []
            }
        },
        components:{
    hpCatalog,
    hpSelect,
},
        computed: {
            ...mapGetters([
        'ELECTRIC_GUITARS', 'ARTIST'
        ]),
        pathElectric(){
            let path = '/electric_guitars/'
            return path
        },

        filterData(){
            if(this.options.length !== 0){
                this.pageNumber = 1;
            }
            if (!this.options.length == 0){
                let options = toRaw(this.options)
                let filteredList = toRaw(this.ELECTRIC_GUITARS)
                options.forEach(elementOp => {
                        filteredList = filteredList.filter(item => item.specifications.includes(elementOp))
                        
                    })
                return filteredList
            } else {
                return this.ELECTRIC_GUITARS
            }
        },
            
          allPagesList(){
            return Math.ceil(this.filterData.length / this.cardsPerPage)
          },
          startPage() {
            if (this.pageNumber === 1) {
                return 1;
            }

            if (this.pageNumber === this.allPagesList) {
                if (this.allPagesList <= 2){
                    let maxBut = this.maxVisibleButtons - 1;
                    return this.allPagesList - maxBut + 1;
                }
                return this.allPagesList - this.maxVisibleButtons + 1;
            }

            return this.pageNumber - 1;
        },
        pages() {
            const range = [];
                    for (
                    let i = this.startPage; 
                    i <= Math.min(this.startPage + this.maxVisibleButtons - 1, this.allPagesList);
                    i++
                ) {
                    range.push({
                    name: i,
                    isDisabled: i === this.pageNumber
                    });
                }
                return range;
        },
          paginatedGuitarsList(){
            let from = (this.pageNumber - 1) * this.cardsPerPage;
            let to = from + this.cardsPerPage;
            return this.filterData.slice(from, to)
          },
        },
        methods:{
            chooseCategorie(value){
                if(this.options.includes(value)){
                    this.options = this.options.filter(item => item !== value)
                } else {
                    this.options.push(value)
                }
            },
            nextPage(){
                this.pageNumber += 1
            },
            prevPage(){
                this.pageNumber -= 1
            },
            selectPage(page){
                this.pageNumber = page;
            },
            firstPage(){
                this.pageNumber = 1;
            },
            lastPage(){
                this.pageNumber = this.allPagesList;
            },
            isPageActive(page) {
            return this.pageNumber === page;
            },
            ...mapActions([
            'GET_GUITARS_FROM_API'
            ])
        },
        mounted(){
        this.GET_GUITARS_FROM_API(),
        this.artist = toRaw(Object.values(this.ARTIST))
        }
    }
</script>

<style scoped>
    .hp-electric{
        padding: 80px 0 0 0;
        background-color: #f0f0f0;
    }
    .hp-electric-wrapper{
        display: flex;
        justify-content: space-between;
        margin: 72px 225px 0 225px;
    }
    #hp-page-theme{
      background-image: url(../assets/images/Electricguitar_theme.png);
       height: 128px;
       font-family: 'Jost';
       font-weight: 600;
       font-size: 32px;
       display: flex;
       align-items: flex-end;
       padding-left: 225px;
       color: white;
   }
   #hp-page-theme p{
        padding-bottom: 24px;
   }
   .catalog_pagination_wrapper{
    margin-top: 24px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    
    background-color: #ffffff;
    }
    .page{
        margin: 12px 0 12px 0;
        display: flex;
        width: 30px;
        height: 30px;
        align-items: center;
        justify-content: center;
        background-color: #ffffff;
        cursor: pointer;
    }
    .catalog_pagination_wrapper:empty{
        display: none;
    }
    .active {
        background-color: #F67800;
        color: #ffffff;
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