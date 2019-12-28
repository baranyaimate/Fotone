<template>
    <button class="btn ml-4 py-1" @click="followUser" v-text="buttonText" v-bind:class="{btnPrimary: !status, btnOutlinePrimary: status}"></button>
</template>

<script>
import { METHODS, request } from 'http'
    export default {
        props: ['userId', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function () {
            return {
                status: this.follows,
            }
        },

        methods: {
            followUser() {
                axios.post('/follow/' + this.userId)
                    .then(response => {
                        this.status = ! this.status;

                        console.log(response.data);
                    })
                    .catch(errors => {
                        if (errors.response.status == 401) {
                            window.location = '/login';
                        }
                    });
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            },
        }
    }
</script>
