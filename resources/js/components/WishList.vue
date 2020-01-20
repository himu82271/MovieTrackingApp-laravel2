<template>
    <v-container>

        <h1>WISHLIST WITH VUE.JS</h1>

        <!-- ADD ITEM -->
        
            <div id="reveal">

                <div class="show"></div>

                <div id="form-group">

                    <v-input
                    v-model="newItemName"
                    placeholder="Name"
                    ></v-input>

                    <v-input
                    v-model="newItemLink"
                    placeholder="url to buy"
                    ></v-input>

                    <button v-on:click="addItem">+</button>
                </div>
                

            </div>

        <!-- ADD ITEM -->

        <!-- RENDER ITEM -->

            <v-list>
                <wishItem 
                v-for="(item,index) in wishlist" :key="(index)" 
                :item="item" 
                v-on:remove="wishlist.splice(index, 1)" 
                v-on:check="toggleActive(index)" 
                v-bind:class="{ active : item.isActive}"/>
            </v-list>

        <!-- RENDER ITEM -->
    </v-container>

</template>
<script>
    import wishItem from './WishListItem'
    export default {
        components:{
            wishItem
        },
        data:()=>({
            newItemName: '',
            newItemLink: '',

            //Initial items
            wishlist: [
                { text: 'Hario XGS-36TB 360 ml', link: 'https://www.amazon.de/dp/B000P4B4HO/ref=wl_it_dp_o_pC_nS_ttl?_encoding=UTF8&colid=3IYQFXZHX9BG8&coliid=I2FA31Y7EW2203', isActive: false },
                { text: 'Bowie Cat Brooch', link: 'https://www.etsy.com/it/listing/249024186/bowie-halloween-gatto-david-bowie-gatto', isActive: false },
                { text: 'Fujifilm X-T10', link: 'https://www.amazon.de/Fujifilm-Systemkamera-Fujinon-Objektiv-Megapixel/dp/B00XW69398/ref=sr_1_3?ie=UTF8&qid=1483887368&sr=8-3&keywords=fujifilm+x+t10', isActive: false },
                { text: 'JavaScript: The Good Parts', link: 'https://www.amazon.de/dp/0596517742/ref=wl_it_dp_o_pC_nS_ttl?_encoding=UTF8&colid=3IYQFXZHX9BG8&coliid=IWYXGO04X62D1', isActive: false },
                { text: 'Andromeda and the Celestial Protista', link: 'https://www.etsy.com/it/listing/275344622/andromeda-e-il-celeste-protista-edizione', isActive: false }
            ]
        }),

    methods: {
            addItem: function () {
                this.wishlist.push({ text: this.newItemName, link: this.newItemLink, isActive:false  })
                this.newItemName = ''
                this.newItemLink = ''
            },

            toggleActive: function(item) {
                this.wishlist[item].isActive = !this.wishlist[item].isActive;
            }
        }
    
    }
</script>
<style scoped>
    @import url('https://fonts.googleapis.com/css?family=Raleway');

    body {
    background-color: #E3A857;
    color:#FFF;
    font-family: 'Raleway', sans-serif;
    }

    input:focus,
    select:focus,
    textarea:focus,
    button:focus {
        outline: none;
    }

    h1 {
    min-width:430px;
    text-align: center;
    letter-spacing: 9px;

    font-size:35px;
    }


    #app {
    width:90%;
    min-width: 430px;
    margin: auto;
    text-align: left;
    }

    .show {
    color: #E3A857;
    width: 45px;
    height: 45px;
    border-radius: 100%;
    background-color: #fff;
    margin:auto;
    }

    .show:before {
    content: '+';
    position: relative;
    font-size: 70px;
    top: -18px;
    left: 8px;
    }

    #reveal #form-group {
    opacity: 0;
    text-align: center;
    margin: 10px auto;
    height: 0px;
    overflow: hidden;
    width: 100%;
    transition:all 0.3s ease-in-out;
    }

    #reveal:hover #form-group {
    opacity: 1;
    height: auto;

    }

    input {
    font-size: 15px;
    padding-left: 10px;
    }

    input, #form-group button{
    height: 30px;
    font-family: 'Raleway', sans-serif;
    border-radius: 5px;

    background-color: #fff;
    
    font-weight: bold;
    border: 1px dashed #E3A857;
    color: #E3A857;
    }
    #form-group button {
    height: 35px;
    width: 59px;
    font-size: 20px;
    font-family: 'Raleway', sans-serif;

    }

    #form-group button:hover {
    height: 35px;
    width: 59px;
    font-family: 'Raleway', sans-serif;
    background-color: #E3A857;
    border: 1px dashed #FFF;
    color: #FFF;
    }


    ul {
    list-style: none;
    padding: 0;
    }

    li {

    display: block;

        overflow: hidden;
    text-align: center;
    border-bottom: 1px solid #F8DE7E;
    padding:10px;
    height: 20px;
    background: #fff;
    color:#E3A857;
    margin-bottom: 3px;
    -webkit-transition: -webkit-all 0.5s cubic-bezier(.25,.1,.25,1);
    transition: all 0.5s cubic-bezier(.25,.1,.25,1);
    }

    li:hover {
    height: 80px;

    }

    li .item-actions {
    opacity: 0;
    padding-top: 10px;
    
    } 

    li .item-actions button {
    width:50px;
    height: 50px;
    border-radius: 100%;
    background-color: #fff;
    font-size: 20px;
    font-weight: bold;
    border: 1px dashed #E3A857;
    color: #E3A857;
    }

    li .item-actions button:hover {

    background-color: #E3A857;
    border: 1px dashed #FFF;
    color: #FFF;
    }

    li:hover .item-actions {
    opacity: 1;
    } 

    li .bought:after {
    content: '✓';

    }

    .active .bought:after {
    color:red;
    }

    .active {
    
    opacity: 0.4;
    }



</style>