<template>
        <v-col >
            <v-card class="mx-auto" max-width="344">
                <v-img
                    v-bind:src="`https://image.tmdb.org/t/p/w500${item.imageUrl}`"
                    height="400px"
                ></v-img>

                <v-card-title>
                    {{item.title}}
                </v-card-title>

                <v-card-subtitle>
                    Avarage Reating: {{item.rating}}
                </v-card-subtitle>

                <v-card-actions>
                    <v-btn text>
                        Share
                    </v-btn>

                    <v-btn color="purple" text >
                        Explore
                    </v-btn>

                     <v-btn color="purple" text @click="ratingShow = !ratingShow">
                        <v-icon>
                            mdi-certificate
                        </v-icon>
                    </v-btn>

                     <v-btn class="" color="purple" text @click="wishlist= !wishlist"
                        :class="{active: wishlist}">
                         {{wishAdd(wishlist)}}
                        <v-icon>
                            mdi-file-word-box
                        </v-icon>
                    </v-btn>

                    <v-spacer></v-spacer>

                    <v-btn icon @click="show = !show">
                        <v-icon class="blur--text">{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
                    </v-btn>
                </v-card-actions>

                <v-expand-transition>
                    <div v-show="show">
                        <v-divider></v-divider>

                        <v-card-text>
                            I'm a thing. But, like most politicians, he promised more than he could deliver. 
                            You won't have time for sleeping, soldier, not with all the bed making you'll be doing. 
                            Then we'll go with that data file! Hey, you add a one and two zeros to that or we walk! 
                            You're going to do his laundry? I've got to find a way to escape.
                        </v-card-text>
                    </div>
                </v-expand-transition>
            </v-card>
            <div class="comentPanel" v-show="ratingShow">
                <v-icon class="closeIcon" @click="ratingShow = !ratingShow">mdi-close-circle-outline</v-icon>
                <v-card class="mx-auto" max-width="344" >
                    <v-textarea v-model="comments" background-color="amber lighten-4" 
                        color="orange orange-darken-4" label="Label">
                    </v-textarea>
                    <v-card-actions class="pa-4">
                        Rate this album
                        <v-spacer></v-spacer>
                        <span class="grey--text text--lighten-2 caption mr-2">
                            ({{ rating }})
                        </span>
                        <v-rating
                            v-model="rating"
                            background-color="white"
                            color="yellow accent-4"
                            dense
                            half-increments
                            hover
                            size="18"
                        ></v-rating>
                        <v-btn class="subBtn" @click="submit">
                            submit
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </div>
        </v-col> 
</template>

<script>
    export default {
        data:()=>({
            show: false,
            ratingShow: false,
            rating: 4.3,
            comments: '',
            wishlist: false,
            wishAdded: 0
        }),
        props: {
            item: Object,
        },
        methods:{
            submit(){
                axios.post('/api/review/user',{
                    comment: this.comments,
                    rating: this.rating,
                    movieName: this.item.title,
                    wishAdded: this.wishAdded
                }).then(function (response){
                    console.log(response);
                });
                // alert('Comment added');
            },
            wishAdd(added){
                let wished;
                if(added == true){
                    wished = 1;
                }
                else{
                    wished = 0;
                }
                this.wishAdded = wished;
            }
        }
    }
</script>
<style scoped>

    .comentPanel{
        position: absolute;
        position: absolute;
        top: 12px;
        right: 96px;
        width: 64%;
        background-color: rgba(1, 15, 15, 0.575);
        padding: 100px 10px;
    }
    .closeIcon{
        position: absolute;
        top: 75px;
        right: 10px;
        color: darksalmon;
    }
    .subBtn{
        position: relative;
        cursor: pointer;
    }
    .active{
        color: brown;
    }
</style>
