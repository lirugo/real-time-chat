<template>
    <div v-if="loading">
        <div class="loader"></div>
    </div>
    <div v-else-if="conversation">
        <div class="card">
            <div class="card-body">
                <ul class="list-inline" v-if="conversation.users.data.length">
                    <li><strong>In conversation:</strong></li>
                    <li class="list-inline-item user-in" v-for="user in conversation.users.data">{{ user.name }}</li>
                </ul>

                <conversation-add-user-form></conversation-add-user-form>
            </div>
        </div>
        <hr>

        <conversation-reply-form></conversation-reply-form>

        <hr>
        <div class="media" v-for="reply in conversation.replies.data" style="padding-top: 10px;">
            <div class="media-left" style="padding-right: 10px;">
                <img v-bind:src="reply.user.data.avatar" v-bind:alt="reply.user.data.name"/>
            </div>
            <div class="media-body">
                <p>{{ reply.user.data.name }} &bull; {{ reply.created_at_human }}</p>
                <div class="card card-default">
                    <div class="card-body">
                        {{ reply.body }}
                    </div>
                </div>
            </div>
        </div>

        <div class="media" style="padding-top: 10px;">
            <div class="media-left" style="padding-right: 10px;">
                <img v-bind:src="conversation.user.data.avatar" v-bind:alt="conversation.user.data.name"/>
            </div>
            <div class="media-body">
                <p>{{ conversation.user.data.name }} &bull; {{ conversation.created_at_human }}</p>
                <div class="card card-default">
                    <div class="card-body">
                        {{ conversation.body }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else>Select a conversation.</div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'

    export default {
        props: [
            'id'
        ],
        computed: mapGetters({
            conversation: 'currentConversation',
            loading: 'loadingConversation'
        }),
        methods: {
            ...mapActions([
                'getConversation'
            ])
        },
        mounted () {
            if(this.id !== null){
                this.getConversation(this.id)
            }
        }
    }
</script>


<style>
    .user-in{
        border-radius: 2px 2px;
        border: 1px #ccc solid;
        padding: 5px 8px 5px 8px;
        margin-top:10px;
    }
</style>