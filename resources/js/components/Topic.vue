<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>{{topic.name}}</h3>
                <div v-for="discussion in this.discussions">
                    <h4> {{ discussion.user.name }} </h4>
                    <p>{{ discussion.body }}</p>
                </div>
                <hr>
                <form action="#" @submit.prevent="create">
                    <textarea name="30" cols="10" rows="5" v-model="talking" class="form-control"></textarea>
                    <button type="submit" class="btn btn-danger float-end mt-2">发布</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['topic'],
        data(){
            return {
                discussions : this.topic.discussions,
                talking : '',
            }
        },
        mounted() {
            window.Echo.private(`topics.channel.${this.topic.id}`).listen('DiscussionCreated', (discussion) => {
                this.discussions.push(discussion);
            });
        },
        methods : {
            create(){
                axios.post(`/topics/${this.topic.id}/discussions`, {
                    body: this.talking,
                }).then((response)=>{
                    this.discussions.push(response.data)
                });
                this.talking = '';
            }
        }
    }
</script>
