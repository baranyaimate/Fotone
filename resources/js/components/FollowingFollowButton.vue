<template>
    <button class="btn float-right ml-auto" @click="followUser" v-text="buttonText" v-bind:class="{'btn-primary': !status, 'btn-outline-primary': status}"></button>
</template>

<script>
import { METHODS, request } from 'http'
    export default {
        props: ['userId', 'follows'],

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
            }
        }
    }
</script>
