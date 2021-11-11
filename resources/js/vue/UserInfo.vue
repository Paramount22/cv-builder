<template>
    <div>
      <span class="text-white">Email:</span>
       <span class="text-white" v-if="!updatedEmail">
           {{user.email}}
       </span>

        <span class="text-white" v-if="updatedEmail">
            {{updatedEmail}}
        </span>
    </div>
</template>

<script>
    export default {
        name: "UserInfo",
        props: ['user'],

        data() {
            return {
                //email: this.user.email,
                userId: this.user.id,
                userData: [],
                updatedEmail: '',
            }
        },

        created() {

            this.$root.$on('updatedEmail', data => {
                //console.log(data);
                this.updatedEmail = data
            });

        },
        methods: {
            getUser() {
                axios.get(`/user/${this.userId}`)
                    .then(response => {
                        this.userData =  response.data
                    })
            }
        }
    }
</script>

<style scoped>
    span {
        font-weight: bolder;
    }
</style>
