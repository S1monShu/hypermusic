<template>
    <footer>
        <RouterLink :to="{name: 'main'}">
            <img src="../assets/images/Лого.png">
        </RouterLink>
    </footer>
</template>
<script>
export default {
    
}
</script>
<style scoped>
    footer{
        margin-top: 96px;
        background-color: #FFFFFF;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-top: 1px solid #c5c5c5;
    }
    img{
        width: 315px;
    }
</style>