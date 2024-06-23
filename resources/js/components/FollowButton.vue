<template>
    <div>
        <button
            class="btn btn-primary"
            style="margin-left: 30px"
            @click="followUser"
        >
        {{ buttonText }}
        </button>
    </div>
</template>

<script>
import axios from "axios"; // Don't forget to import axios

export default {
    props:['userId','follow'],

    mounted() {
        console.log("Component mounted.");
    },

    data:function(){
        return{
            status:this.follow
        }
    },

    methods: {
        followUser() {
            axios
                .post("/follow/"+this.userId)
                .then(response => {
                    this.status=!this.status;
                    console.log(response);
                })
        },
    },

    computed:{
        buttonText(){
            if(this.status==1)
            {
                return 'Unfollow';
            }
            return 'Follow';
        }
    }
};
</script>
