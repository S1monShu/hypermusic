<template>
    <div class="hp-select_wrapper">
        <p @click="toggleVisibility()">Сортировать</p>
        <div class="select">
            <div class="model_wrapper">
                <div class="title" @click="toggleVisibility('model')">
                    <p>Форма корпуса</p>
                    <p class="menu_state">+</p>
                </div>
                <div class="options" v-for="model in models" :key="model.value" v-show="areModelsVisible">
                    <input class="checkbox__input" type="checkbox" :id="model.value" v-on:input="selectOptionString(model.name)"><label class="checkbox__label" :for="model.value">{{model.name}}</label>
                </div>
            </div>
            <div class="model_wrapper">
                <div class="title" @click="toggleVisibility('orientation')">
                    <p>Ориентация</p>
                    <p class="menu_state">+</p>
                </div>
                <div class="options" v-for="orientation in orientations" :key="orientation.value" v-show="areOrientationsVisible">
                    <input class="checkbox__input" type="checkbox" :id="orientation.value" v-on:input="selectOptionString(orientation.name)"><label class="checkbox__label" :for="orientation.value">{{orientation.name}}</label>
                </div>
            </div>
            <div class="model_wrapper" >
                <div class="title" @click="toggleVisibility('creator')">
                    <p>Производитель</p>
                    <p class="menu_state">+</p>
                </div>
                <div class="options" v-for="creator in creators" :key="creator.value" v-show="areCreatorsVisible">
                    <input class="checkbox__input" type="checkbox"  :id="creator.value" v-on:input="selectOptionString(creator.name)"><label class="checkbox__label" :for="creator.value">{{creator.name}}</label>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
        name: 'hp-select',
        data(){
            return{
                title: 'select',
                areOptionsVisible: true,
                areModelsVisible: true,
                areOrientationsVisible: true,
                areCreatorsVisible: true,
                optionName: ''
            }
        },
        props:{
            models:{
                type: Array,
                default(){
                    return{}
                }
            },
            orientations:{
                type: Array,
                default(){
                    return{}
                }
            },
            creators:{
                type: Array,
                default(){
                    return{}
                }
            }
        },
        methods:{
            toggleVisibility(option_name){
                switch(option_name) {
                    case 'model': 
                        this.areModelsVisible = !this.areModelsVisible
                    break;
                    case 'orientation':
                        this.areOrientationsVisible = !this.areOrientationsVisible
                    break;
                    case 'creator':
                        this.areCreatorsVisible = !this.areCreatorsVisible
                    break;
                    default: {
                        this.areOptionsVisible = !this.areOptionsVisible
                    }
                }
            },
            selectOptionString(option){
                this.optionName = option;
                this.$emit('selectoptionstring', this.optionName);
            }
        },
}
</script>
<style scoped>
    .hp-select_wrapper{
        background-color: #FFFFFF;
        display: inline-block;
        height: fit-content;
        padding: 24px;
        width: 300px;
        font-family: 'NT Somic';
        font-size: 24px;
        font-weight: 700;
       
    }
    .hp-select_wrapper p{
        margin-top: 0;
    }
    .title{
        font-family: 'Jost';
        font-size: 18px;
        font-weight: 600;
        display: flex;
        background: none;
        color: #5f5f5f;
        border-bottom: solid 1px #c5c5c5;
        box-sizing: border-box;
        align-items: center;
        height: 50px;
        justify-content: space-between;
        margin: 16px 0 12px 0;
    }
    .menu_state{
        font-family: 'Jost';
        font-weight: 300;
    }
    .title:hover{
        cursor: pointer;
    }
    
    .options{
        position: relative;
        font-family: 'NT Somic';
        font-size: 14px;
        font-weight: 500;
        padding: 4px 0 4px 0;
    }
    .checkbox__input{
        appearance: none;
        -webkit-appearance: none;
        position: absolute;
    }

    .checkbox__label{
        padding-left: 32px;
    }
    .checkbox__label::before{
        content: "";
        display: block;
        width: 16px;
        height: 16px;
        border: 1px solid #5f5f5f;
        margin-top: 6px;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
    }
    .checkbox__label::after{
        content: "";
        display: block;
        width: 16px;
        height: 16px;
        margin-top: 6px;
        background: url(../assets/icons/Check.png);
        background-size: 16px 16px;
        border: 1px solid #F67800;
        opacity: 0;

        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
    }
    .checkbox__input:checked + .checkbox__label::after{
        opacity: 100;
    }

</style>